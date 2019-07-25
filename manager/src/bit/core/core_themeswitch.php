<?php
  session_start();
  include_once './src/bit/login/login_verification.php';
  include './../../db/connect.php';

  $data = $db->prepare("SELECT theme FROM hub_users WHERE username=?");
  $update = $db->prepare("UPDATE hub_users SET theme=? WHERE username=?");
  $data->execute([$_SESSION["username"]]);
  $row = $data->fetch();


  if ($row["theme"] == 0 || $row["theme"] == 1){
    $update->execute(['2', $_SESSION["username"]]);
    header("Location: {$_SERVER['HTTP_REFERER']}");
  } elseif ($row["theme"] == 2){
    $update->execute(['1', $_SESSION["username"]]);
    header("Location: {$_SERVER['HTTP_REFERER']}");
  }

?>
