<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>GamingTwitter</title>
  <meta name="description" content="GamingTwitter">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="/assets/css/normalize.css">
  <link rel="stylesheet" href="/assets/css/lightbox.css">
  <link rel="stylesheet" href="/assets/css/common.css">
  <link rel="stylesheet" href="/assets/css/tweet.css">
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

    <?php
      $DB_HOST = "gamingtwitter_mysqld";
      $DB_USER = "gamingtwitter_user";
      $DB_PASS = "secret";

      $link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS);
      if (mysqli_connect_errno()) {
        echo "データベースの接続に失敗しました。\n";
      }

      $db_selected = mysqli_select_db($link, 'gamingtwitter');

      if ($result = mysqli_query($link, "SELECT title FROM games WHERE id=" . $_GET["id"])) {
        if (!$result) {
          echo "SELECT に失敗しました。\n";
        }
      }
      mysqli_close($link);
    ?>
    <div class="body">
      <?php foreach($result as $row) { ?>
        <h1 class="page-title"><?php echo $row['title']; ?></h1>
      <?php } ?>

      <form class="tweet-form" action="createTweet.php" method="post">
        <textarea class="tweet-form__area" rows="10" name="content"></textarea>
        <input type="submit" />
      </form>

      <div class="tweets_wrapper">
        <ul class="tweets">
          <li class="tweet">
            <div class="tweet__content">ここにツイート内容が入ります</div>
            <div class="tweet__images">
              <div class="tweet__image">
                <a href="https://img-eshop.cdn.nintendo.net/i/709a4c7d57343f0f286d94310c8d4e52987192638a9dd0c1b27e1b4aa24f3b0b.jpg?w=1000" data-lightbox="gallery01">
                  <img src="https://img-eshop.cdn.nintendo.net/i/709a4c7d57343f0f286d94310c8d4e52987192638a9dd0c1b27e1b4aa24f3b0b.jpg?w=1000" alt="">
                </a>
              </div>
              <div class="tweet__image">
                <a href="https://images-na.ssl-images-amazon.com/images/I/81KH+LrAyZL._RI_.jpg" data-lightbox="gallery01">
                  <img src="https://images-na.ssl-images-amazon.com/images/I/81KH+LrAyZL._RI_.jpg" alt="">
                </a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="/assets/js/lib/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="/assets/js/lib/lightbox.js"></script>
  <script type="text/javascript" src="/assets/js/common.js"></script>
  <script type="text/javascript" src="/assets/js/tweet.js"></script>
</body>
</html>