<?php
include "./vars.php";
$cssList = ["css/index.css"]; 
include "./template_top.php";
include "./template_main.php";
require_once "../connect.php";
require_once "../Utilities.php";

// 配置參數
$perPage = 25;
$page = intval($_GET["page"] ?? 1);
$pageStart = ($page - 1) * $perPage;

// 準備 SQL 語句
$sql = "SELECT * FROM `users` WHERE `is_valid` = 1 LIMIT $perPage OFFSET $pageStart";
$sqlAll = "SELECT * FROM `users3` WHERE `is_valid` = 1";

try {
    // 獲取分頁數據
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 獲取總記錄數
    $stmtAll = $pdo->prepare($sqlAll);
    $stmtAll->execute();

    $totalCount = $stmtAll->rowCount();
    
    // 計算總頁數
    $totalPage = ceil($totalCount / $perPage);
    
} catch (PDOException $e) {
    // 錯誤處理
    error_log("Database Error: " . $e->getMessage());
    echo "系統發生錯誤，請稍後再試。";
    exit;
}

include "./template_btm.php";
?>