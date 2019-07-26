<?php
  include_once './src/bit/login/login_verification.php';
  include './../db/connect.php';

  $ent_companyid = $_GET["id"];
  $ent_status = $_POST["editentity_status"];
  $ent_city = $_POST["editentity_city"];
  $ent_tel = $_POST["editentity_tel1"];
  $ent_tel2 = $_POST["editentity_tel2"];
  $ent_email = $_POST["editentity_email"];
  $ent_emaila = $_POST["editentity_emaila"];

  $data = $db->prepare("UPDATE man_entity SET isActive=?, city=?, phone=?, phoneSec=?, emailPrimary=?, emailAccountant=? WHERE companyid=?");

  if (!empty($ent_companyid) || !empty($ent_status)){
    $data->execute([$ent_status, $ent_city, $ent_tel, $ent_tel2, $ent_email, $ent_emaila, $ent_companyid]) or die(print_r($db->errorInfo(), true));
    header("Location: {$_SERVER['HTTP_REFERER']}");
  } else {
    header("Location: /manager/manager.php?error");
  }

?>
