<?php
  session_start();
  include './../db/connect.php';

  $username = $_POST['lusername'];
  $password = $_POST['lpass'];
  $count = 0;

  $data = $db->prepare("SELECT username, pass, isActivated FROM users WHERE username=? AND pass=md5(?) AND isActivated=1");
  $data->execute([$username, $password]);
  while ($row = $data->fetch()){ $count++; }

  echo $count;

  if ($count == 1){
    $_SESSION["username"] = $username;
    header("Location: /manager/manager.php");
  } else {
    header("Location: /manager/login.php?failed");
  }
?>
