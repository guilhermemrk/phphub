<?php
  start_session();
  include_once './src/bit/login_verification.php';
  include './../db/connect.php';

  $adent_name = $_POST['entity_name'];
  $adent_status = $_POST['entity_status'];
  $adent_city = $_POST['entity_city'];
  $adent_phone = $_POST['entity_tel1'];
  $adent_phone2 = $_POST['entity_tel2'];
  $adent_email = $_POST['entity_email'];
  $adent_emaila = $_POST['entity_emaila'];
  $sUsername = $_SESSION['username'];

  $data = $db->prepare("INSERT INTO man_entity (companyName, phone, phoneSec, emailPrimary, emailAccountant, city, isActive, addedBy) VALUES (?,?,?,?,?,?,?,?)");

  echo "
  Nome: $adent_name<br />
  Status: $adent_status<br />
  Cidade: $adent_city<br />
  T: $adent_phone<br />
  T2: $adent_phone2<br />
  E: $adent_email<br />
  E2: $adent_emaila<br />
  Sessão: $sUsername
  ";

  // if (!empty($adent_name) || !empty($adent_status) || !empty($sUsername)){
  //   $data->execute([$adent_name, $adent_phone, $adent_phone2, $adent_email, $adent_emaila, $adent_city, $adent_status, $sUsername]) or die(print_r($db->errorInfo(), true));
  //   header("Location: {$_SERVER['HTTP_REFERER']}");
  // } else {
  //   header("Location: /manager/manager.php?error_addentry");
  // }

?>
