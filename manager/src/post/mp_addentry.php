<?php
  include_once './src/bit/login_verification.php';
  include './../db/connect.php';

  $ae_companyid = $_POST['companyid'];
  $ae_status = $_POST['status'];
  $ae_problem = utf8_encode($_POST['problem']);

  $data = $db->prepare("INSERT INTO manager (companyid, problem, status) VALUES (?, ?, ?)") or die(print_r($db->errorInfo(), true));

  if (!empty($ae_companyid) || !empty($ae_status) || !empty($ae_problem)){
    $data->execute([$ae_companyid, $ae_problem, $ae_status]);
    header("Location: {$_SERVER['HTTP_REFERER']}");
  } else {
    header("Location: /manager/manager.php?error_addentry");
  }

?>
