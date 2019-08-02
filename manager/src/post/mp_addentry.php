<?php
  session_start();
  include_once './src/bit/login/login_verification.php';
  include './../db/connect.php';

  $sUsername = $_SESSION["username"];
  $ae_companyid = $_POST['companyid'];
  $ae_status = $_POST['status'];
  $ae_problem = utf8_decode($_POST['problem']);
  $sUsername = $_SESSION["username"];
  $category = $_POST["entryCategory"];

  $data = $db->prepare("INSERT INTO man_manager (companyid, problem, status, addedBy, category) VALUES (?, ?, ?, ?, ?)");

  if (!empty($ae_companyid) || !empty($ae_status) || !empty($ae_problem)){
    $data->execute([$ae_companyid, $ae_problem, $ae_status, $sUsername, $category]) or die(print_r($db->errorInfo(), true));
    header("Location: {$_SERVER['HTTP_REFERER']}");
  } else {
    header("Location: /manager/manager.php?error");
  }

?>
