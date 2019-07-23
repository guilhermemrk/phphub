<?php
  session_start();
  include './../db/connect.php';

  $username = $_POST['lusername'];
  $password = $_POST['lpass'];
  $count = 0;

  $data = $db->prepare("SELECT userid, username, pass, isActivated FROM hub_users WHERE username=? AND pass=md5(?) AND isActivated=1");
  $data->execute([$username, $password]) or die(print_r($db->errorInfo(), true));
  while ($row = $data->fetch()){ $count++; }

  if ($count == 1){
    $_SESSION["username"] = $username;
    // $_SESSION["userid"] = $userid;
    header("Location: /manager/manager.php?firstlogin");
  } else {
    header("Location: /manager/login.php?loginerror");
  }
?>
