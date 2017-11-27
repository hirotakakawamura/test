<?php
try {
$dsn='データベース名';
$username='ユーザー名';
$password='パスワード';
$pdo = new PDO($dsn,$username,$password);
} catch (PDOException $e) {
 exit('データベース接続失敗。'.$e->getMessage());
}
 ?>
 <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>kadai_2-7</title>
    </head>
    <body>
    </body>
</html>
