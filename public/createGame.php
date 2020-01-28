<?php
  $DB_HOST = "gamingtwitter_mysqld";
  $DB_USER = "gamingtwitter_user";
  $DB_PASS = "secret";

  $link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS);
  if (mysqli_connect_errno()) {
    echo "データベースの接続に失敗しました。\n";
  }

  $db_selected = mysqli_select_db($link, 'gamingtwitter');

  $title = $_REQUEST['title'];

  $result = mysqli_query($link, "INSERT INTO games (title) VALUES('$title')");
  if (!$result) {
    echo "データを登録できませんでした。\n";
  }

  mysqli_close($link);

  header("Location: ./index.php");