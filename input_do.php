<?php require('dbconnect.php'); ?>

<!doctype html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Memo</title>
</head>

<body>


  <main>

    <?php

    $sql = 'INSERT INTO memos SET memo=?, created_at=NOW()';
    $statement = $db->prepare($sql);
    $data[] = $_POST['memo'];
    $statement->execute($data);
    echo 'メモが登録されました';

    ?>
    <br>
    <a href="index.php">戻る</a>

  </main>


















































</body>

</html>