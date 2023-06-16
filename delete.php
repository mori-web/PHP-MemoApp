<?php require('dbconnect.php'); ?>

<!doctype html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>よくわかるPHPの教科書</title>
</head>

<body>

  <main>

    <?php
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
      $id = $_GET['id'];
      $stmt = $db->prepare('DELETE FROM memos WHERE id=?');
      $data[] = $id;
      $stmt->execute($data);
    }
    ?>

    <p>メモを削除しました</p>
    <p><a href="index.php">戻る</a></p>

  </main>
</body>

</html>