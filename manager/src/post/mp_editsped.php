<?php
  session_start();
  include_once './src/bit/login/login_verification.php';
  include './../db/connect.php';

  $sped_id = $_GET["id"];
  $sped_status = $_POST["editsped_status"];
  $sUsername = $_SESSION["login"][0];

  $data = $db->prepare("UPDATE man_entity SET sped_status=?, sped_user=? WHERE companyid=?");
  if ((is_NULL($sped_id) || empty($sped_id)) || ((!is_numeric($sped_status) && is_NULL($sped_status)) || empty($sped_status))){
    header("Location: /manager/manager.php?sped&error");
  } else {
    if ($sped_status != 1){
      $data->execute([$sped_status, $sUsername, $sped_id]) or die(print_r($db->errorInfo(), true));
      header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {
      $data->execute([$sped_status, NULL, $sped_id]) or die(print_r($db->errorInfo(), true));
      header("Location: {$_SERVER['HTTP_REFERER']}");
    }
  }

?>
