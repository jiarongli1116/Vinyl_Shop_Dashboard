<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>新增會員表單</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <h1>增加使用者</h1>
        <form action="./doAdd.php" method="post" enctype="multipart/form-data">
            <div class="input-group mb-1">
                <span class="input-group-text">信箱</span>
                <input required name="email" type="text" class="form-control" placeholder="使用者信箱">
            </div>
            <div class="input-group mb-1">
                <span class="input-group-text">密碼</span>
                <input required name="password" type="password" class="form-control" placeholder="使用者密碼">
            </div>
            <div class="input-group mb-1">
                <span class="input-group-text">姓名</span>
                <input required name="name" type="text" class="form-control" placeholder="使用者姓名">
            </div>
            <div class="input-group mb-1">
                <input name="myFile" type="file" class="form-control">
            </div>
            <div class="mt-1 text-end">
                <button type="submit" class="btn btn-info btn-send">送出</button>
                <a class="btn btn-primary" href="./index.php">取消</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>