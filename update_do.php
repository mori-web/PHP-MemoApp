<?php require('dbconnect.php') ?>


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

    <div class="container mt-5">
      <h2>編集画面</h2>

      <?php
        $statement = $db->prepare('UPDATE memos SET memo=? WHERE id=?');
        $data[] = $_POST['memo'];
        $data[] = $_POST['id'];
        $statement->execute($data);
      ?>
      <p>メモの内容を変更しました</p>
      <p><a href="index.php">戻る</a></p>

    </div>

  </main>
</body>

</html>