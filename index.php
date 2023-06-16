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
    // もしURLパラメータがなかったときや、数字以外での値が送られた時は、1ページ目を表示させる指定をする
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
      $page = $_GET['page'];
    } else {
      $page = 1;
    }

    $start = 5 * ($page - 1);
    $memos = $db->prepare('SELECT * FROM memos ORDER BY id LIMIT ?,5');
    // ->execute()のパラメータには文字列しか渡せないため、bindParmを使用している
    // ->bindParam()の第1パラメータの1は、?の順番、
    // ->bindParam()の第2パラメータは、値
    // ->bindParam()の第3パラメータは、数字の型の指定
    $memos->bindParam(1, $start, PDO::PARAM_INT);
    $memos->execute();
    ?>

    <div class="container mt-5">
      <article>
        <h2>一覧画面</h2>
        <div class="mt-5">
          <?php while ($memo = $memos->fetch()) : ?>
            <p>
              <a href="memo.php?id=<?php print($memo['id']); ?>">
                <?php print(mb_substr($memo['memo'], 0, 50)) ?>
                <?php print((mb_strlen($memo['memo']) > 50 ? '...' : '')); ?>
              </a>
            </p>
            <time><?php print($memo['created_at']); ?></time>
            <hr>
          <?php endwhile; ?>

          <!------------------ ページネーションの作成 --------------------->
          <!-- 前ボタンは2ページ以降に表示する -->
          <?php if ($page >= 2) : ?>
            <a href="index.php?page=<?php print($page - 1); ?>">
              <?php print($page - 1) ?>ページ目へ
            </a>｜
          <?php endif; ?>
          <!-- 前ボタン -->

          <!-- 次ボタンはmemoの件数を全て取得して最大ページを計算する -->
          <?php
          $counts = $db->query('SELECT COUNT(*) AS cnt FROM memos');
          $count = $counts->fetch();
          // ceil関数は小数点切り上げる
          $max_page = ceil($count['cnt'] / 5);
          if ($max_page >= $page + 1) :
          ?>
            <a href="index.php?page=<?php print($page + 1); ?>">
              <?php print($page + 1) ?>ページ目へ
            </a>
          <?php endif; ?>
          <!-- 次ボタン -->

          <br>
          <div class="mt-3">
            <a href="./input.html">作成画面へ</a>
          </div>

        </div>
      </article>

    </div>

  </main>
</body>

</html>