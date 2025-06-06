<?php
include "../vars.php";
$cssList = ["../css/index.css"];
include "../template_top.php";
include "../template_main.php";

require_once "../connect.php";
require_once "../Utilities.php";

?>

<?php
$perPage = 25;
$page = intval($_GET["page"] ?? 1);
$pageStart = ($page - 1) * $perPage;

//整理主sql
$sql = "SELECT * FROM `users` WHERE `is_valid` = 1 LIMIT $perPage OFFSET $pageStart";
$sqlAll = "SELECT * FROM `users` WHERE `is_valid` = 1 ";

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

    <div class="container mt-3">
        <h1>使用者列表</h1>
        <div class="my-2 d-flex">
            <span class="me-auto">目前共 <?= $totalCount ?> 筆資料</span>
            <a class="btn btn-primary btn-sm btn-add" href="./add.php">增加資料</a>
        </div>
        <div class="msg text-bg-dark ps-1">
            <div class="id">#</div>
            <div class="name">姓名</div>
            <div class="content">email</div>
            <div class="time">操作</div>
        </div>



        <?php foreach ($rows as $index => $row): ?>
            <div class="msg">
                <div class="id"><?= $index + 1 + ($page - 1) * $perPage ?></div>
                <div class="name"><?= $row["name"] ?></div>
                <div class="content"><?= $row["email"] ?></div>
                <div class="time">
                    <div class="btn btn-danger btn-sm btn-del" data-id="<?= $row["id"] ?>">刪除</div>
                    <a class="btn btn-warning btn-sm" href="./update.php?id=<?= $row["id"] ?>">修改</a>
                </div>
            </div>
        <?php endforeach; ?>

        <ul class="pagination pagination-sm justify-content-center">
            <?php for($i = 1; $i <= $totalPage; $i++): ?>
            <li class="page-item <?= $page == $i ? "active" : "" ?>">
                <?php
                    $link = "?page={$i}";
                ?>
                <a class="page-link" href="<?=$link?>"><?=$i?></a>
            </li>
            <?php endfor;?>
        </ul>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>

    <script>
        const btnDels = document.querySelectorAll(".btn-del");

        //滑鼠點擊事件
        btnDels.forEach((btn) => {
            btn.addEventListener("click", doConfirm);
        });

        //window.confirm() 前面window可省略
        function doConfirm(e) {
            const btn = e.target;
            console.log(btn.dataset.id);
            if (confirm("確定要刪除嗎")) {
                window.location.href = `./doDelete.php?id=${btn.dataset.id}`;
            }

        };
    </script>


<?php
include "../template_btm.php";
?>