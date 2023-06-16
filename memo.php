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

    // セキュアなURLパラメータの受け取り方
    $id = $_GET['id'];
    // is_numericは値が数字かどうか判定するメソッド
    // idの指定は必ず1以上が指定されるため、1以上であるか？判定
    if (!is_numeric($id) || $id<=0) {
      print('1以上の数字で指定してください');
      exit();
    }

    // SQL文の実行
    $sql = 'SELECT * FROM memos WHERE id=?';
    $memos = $db->prepare($sql);
    $data[] = $id;
    $memos->execute($data); //->executeは配列を受けっとて、「SQLを実行」する

    // SQL文の結果の取得
    $memo = $memos->fetch(); //->fetchは「一行分のレコードを取得」する

    ?>

    <div class="container mt-5">
      <h1 class="mt-3">詳細ページ</h1>
      <article class="mt-5">
        <pre><?php echo $memo['memo'] ?></pre>
        <a href="update.php?id=<?php print ($memo['id']); ?>">編集する</a>
        ｜
        <a href="delete.php?id=<?php print ($memo['id']); ?>">削除する</a>
        ｜
        <a href="index.php">戻る</a>
      </article>
    </div>

  </main>
</body>

</html>