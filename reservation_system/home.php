<?php
session_start();
$name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>会議室予約システム</title>
  <link rel="stylesheet" href="css/html5reset-1.6.1.css">
  <link rel="stylesheet" href="css/base.css">
  <!--何かjavascriptのファイルを読み込む際に使う-->
  <!---
  <script src="javascript/.js"></script>
  -->
</head>

<body>
  <header>
    <div class="container">
      <div class="header-left">
        <h2>四国電力会議室予約システム</h2>
      </div>
      <div class="header-right">
        <div class="header-right">
        <!--ログアウト機能を追加する-->
        <a href="index.php" class="login">ログアウト</a>
        </div>
      </div>
    </div>
  </header>
  <div class="top-wrapper">
    <div class="container">
      <!--愛大太郎のところをログインした人の名前に変更する-->
      <h2><?php echo  htmlspecialchars($name);?>さんの予約状況</h2>
      <!--ここに予約状況の掲示板を貼る-->
      <div class="board">
        <img src="https://via.placeholder.com/650x350">
      </div>
      <!--ここまで-->
    </div>
  </div>

  <div class="message-wrapper">
    <div class="container">
      <a href="reserve_from_conf/home.html" class="btn message box1">会議室から予約</a>
      <a href="reserve_from_time/time_select.html" class="btn message box2">時間から予約</a>
    </div>
  </div>
</body>
</html>