<?php

try {
  $db = new PDO('mysql:dbname=mydb;host=localhost;charest=utf8', 'root', 'root');
  // echo '接続に成功しました!';
} catch (PDOException $e) {
  echo 'DB接続エラー:' . $e->getMessage();
}

