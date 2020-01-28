<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>GamingTwitter</title>
  <meta name="description" content="GamingTwitter">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="/assets/css/normalize.css">
  <link rel="stylesheet" href="/assets/css/common.css">
  <link rel="stylesheet" href="/assets/css/index.css">
</head>

<body>
  <div class="main">
    <aside class="g-nav">
      <div class="g-nav_inner">
        <div class="g-nav__head">
          <a href="/new.php" class="add-btn"></a>
          <div id="js-navToggle" class="nav-toggle"></div>
        </div>
        <ul class="games">
          <?php
            $DB_HOST = "gamingtwitter_mysqld";
            $DB_USER = "gamingtwitter_user";
            $DB_PASS = "secret";

            $link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS);
            if (mysqli_connect_errno()) {
              echo "データベースの接続に失敗しました。\n";
            }

            $db_selected = mysqli_select_db($link, 'gamingtwitter');

            if ($result = mysqli_query($link, "SELECT * FROM games")) {
              if (!$result) {
                echo "SELECT に失敗しました。\n";
              }
            }
            mysqli_close($link);
          ?>
          <?php foreach($result as $row) { ?>
            <li class="game"><a href=<?php echo 'tweet.php?id=' . $row['id']; ?>><?php echo $row['title']; ?></a></li>
          <?php } ?>
        </ul>
      </div>
    </aside>
  </div>

  <script type="text/javascript" src="/assets/js/lib/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="/assets/js/common.js"></script>
</body>
</html>