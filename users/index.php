<?php
include "../vars.php";
$cssList = ["../css/index.css"];
include "../template_top.php";
include "../template_main.php";

?>

<div class="content-section">
    <div class="section-header">
        <h3 class="section-title">會員列表</h3>
        <a href="#" class="btn btn-primary">新增會員</a>
    </div>

    <div class="controls-section">
        <div class="search-box">
            <input type="text" id="memberSearch" placeholder="搜尋會員姓名、Email或編號..." onkeyup="searchMembers()">
            <i class="fas fa-search"></i>
        </div>
        <div class="filter-group">
            <select id="levelFilter" onchange="filterMembers()">
                <option value="">全部等級</option>
                <option value="一般會員">一般會員</option>
                <option value="VIP會員">VIP會員</option>
                <option value="黑膠收藏家">黑膠收藏家</option>
            </select>
            <select id="dateFilter" onchange="filterMembers()">
                <option value="">註冊時間</option>
                <option value="recent">近30天</option>
                <option value="month">近3個月</option>
                <option value="year">近一年</option>
            </select>
            <button class="clear-filters" onclick="clearFilters()">清除篩選</button>
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th class="sortable-header" onclick="sortTable('members', 'id')">會員編號</th>
                    <th class="sortable-header" onclick="sortTable('members', 'name')">姓名</th>
                    <th class="sortable-header" onclick="sortTable('members', 'email')">Email</th>
                    <th class="sortable-header" onclick="sortTable('members', 'level')">等級</th>
                    <th class="sortable-header" onclick="sortTable('members', 'date')">註冊日期</th>
                    <th>操作</th>
                </tr>
            </thead>
        </table>
    </div>
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