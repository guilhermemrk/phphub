<?php
  session_start();
  include_once './src/bit/login/login_verification.php';
  include './../db/connect.php';

  $sped_id = $_GET["id"];
  $sUsername = $_SESSION["username"];

  $data = $db->prepare("UPDATE man_entity SET sped_status=0, sped_user=? WHERE companyid=?");
  if (is_NULL($sped_id) || empty($sped_id)){
    header("Location: /manager/manager.php?sped&error");
  } else {
    $data->execute([$sUsername, $sped_id]) or die(print_r($db->errorInfo(), true));
    header("Location: {$_SERVER['HTTP_REFERER']}");
  }

?>
