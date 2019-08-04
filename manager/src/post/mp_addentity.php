<?php
  session_start();
  include_once './src/bit/login/login_verification.php';
  include './../db/connect.php';

  $adent_name = utf8_decode($_POST["entity_name"]);
  $adent_status = $_POST["entity_status"];
  $adent_city = $_POST["entity_city"];
  $adent_phone = $_POST["entity_tel1"];
  $adent_phone2 = $_POST["entity_tel2"];
  $adent_email = $_POST["entity_email"];
  $adent_emaila = $_POST["entity_emaila"];
  $entity_sped = $_POST["entity_sped"];
  $sUsername = $_SESSION["login"][0];
  $sUsergroup = $_SESSION["login"][1];

  $data = $db->prepare("INSERT INTO man_entity (companyName, phone, phoneSec, emailPrimary, emailAccountant, city, isActive, sped, addedBy, entgroup) VALUES (?,?,?,?,?,?,?,?,?,?)");

  if (!empty($adent_name) || !empty($adent_status) || !empty($sUsername)){
    $data->execute([$adent_name, $adent_phone, $adent_phone2, $adent_email, $adent_emaila, $adent_city, $adent_status, $entity_sped, $sUsername, $sUsergroup]) or die(print_r($db->errorInfo(), true));
    header("Location: {$_SERVER['HTTP_REFERER']}");
  } else {
    header("Location: /manager/manager.php?entity&error");
  }

?>
