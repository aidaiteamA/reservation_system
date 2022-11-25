<?php
session_start();
$error = [];
$user_id = '';
$password = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_STRING);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
  if ($user_id == '' || $password == ''){
    $error['login'] = 'blank';
  }
  else{
    //ログインチェック
    $db = new mysqli('localhost:3306', 'user1', 'password', 'conference_reservation');
    $stmt = $db->prepare('select id ,name, password from login where user_id=?');
    if (!$stmt){
      die($db->error);
    }
    $stmt->bind_param('s', $user_id);
    $success = $stmt->execute();
    if (!$success){
      die($db->error);
    }
    $stmt->bind_result($id, $name, $password_check);
    $stmt->fetch();
    if ($password == $password_check){
      //ログイン成功
      session_regenerate_id();
      $_SESSION['id'] = $name;
      $_SESSION['name'] = $name;
      header('Location: home.php');
      exit();
    }
    else{
      $error['login'] = 'failed';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>会議室予約システム</title>
  <link rel="stylesheet" href="css/html5reset-1.6.1.css">
  <link rel="stylesheet" href="css/form.css">
</head>
<body>
  <h1>会議室予約システムログインページ</h1>
  <form action="" method="POST">
   <div class="example">
    <h2>ユーザーID</h2>
    <input type="text" name="user_id" value="<?php echo htmlspecialchars($user_id)?>">
  </div>
  <div class="example">
    <h2>パスワード</h2>
    <input class="inputs" type="password" name="password" value="<?php echo htmlspecialchars($password)?>">
  </div>
  <?php if($error['login'] == 'blank'):?>
    <p class="error">*ユーザーIDとパスワードをご記入ください</p>
  <?php endif; ?>
  <?php if($error['login'] == 'failed'):?>
  <p class="error">*ログインに失敗しました。正しくご記入ください</p>
  <?php endif; ?>
  <div class="example">
    <input class="submit" type="submit" value="送信">
  </div>  
  </form>
</body>
</html>
