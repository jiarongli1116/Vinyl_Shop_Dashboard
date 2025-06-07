<?php
$host = '127.0.0.1'; 
$username = "admin";
$password = "a12345";
$dbname = "v_db";
$port = 3306;

try {
  $pdo = new PDO(
    "mysql:host=$servername;dbname=$dbname;port=$port;charset=utf8",
    $username,
    $password,
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
  );
  echo "資料庫連線成功";
} catch (PDOException $e) {
  echo "❌ 資料庫連線失敗<br>";
  echo "錯誤訊息: " . $e->getMessage();
  exit;
}

?>