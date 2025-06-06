<?php
include "./vars.php";
$cssList = ["css/index.css"]; 
include "./template_top.php";
include "./template_main.php";
require_once "../connect.php";
require_once "../Utilities.php";


//轉成數字$page = intval($_GET["page"] ?? 1) ;
//分頁起始$pageStart = ($page - 1 ) * $perPage;
//可建立快捷鍵
$perPage = 25;
$page = intval($_GET["page"] ?? 1);
$pageStart = ($page - 1) * $perPage;

//整理主sql
$sql = "SELECT * FROM `users` WHERE `is_valid` = 1 LIMIT $perPage OFFSET $pageStart";
$sqlAll = "SELECT * FROM `users3` WHERE `is_valid` = 1 ";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmtAll = $pdo->prepare($sqlAll);
    $stmtAll->execute();

    $totalCount = $stmtAll->rowCount();
} catch (PDOException $e) {
    echo "錯誤: {{$e->getMessage()}}";
    exit;
}

$totalPage = ceil($totalCount / $perPage);

?>

?>

<?php
include "./template_btm.php";
?>