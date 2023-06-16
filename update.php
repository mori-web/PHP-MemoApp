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
      if(isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $memos = $db->prepare('SELECT * FROM memos WHERE id=?');
        $data[] = $id;
        $memos->execute($data);
        $memo = $memos->fetch();
      }
      ?>

      <form action="update_do.php" method="post">
        <input type="hidden" name="id" value="<?php print($id) ?>">
        <textarea name="memo" cols="50" rows="10"><?php print ($memo['memo']); ?></textarea><br>
        <button type="submit">登録する</button>
      </form>

    </div>

  </main>
</body>

</html>