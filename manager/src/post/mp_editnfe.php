<?php
  include_once './src/bit/login/login_verification.php';
  include './../db/connect.php';

  $enf_gid = $_GET["id"];
  $enf_status = $_POST["editnfe_status"];
  $enf_model = $_POST["editnfe_model"];
  $enf_procedure = $_POST["editnfe_procedure"];
  $enf_id = $_POST["editnfe_id"];
  $enf_nv = $_POST["editnfe_nv"];
  $enf_nf = $_POST["editnfe_nf"];
  $enf_problem = utf8_decode($_POST["editnfe_problem"]);

  $data = $db->prepare("UPDATE man_manager SET status=?, nfe_modelo=?, nfe_todo=?, nfe_id=?, nfe_nv=?, nfe_nf=?, problem=? WHERE entryid=?");

  if (!empty($enf_id) || !empty($enf_status) || !empty($enf_procedure) || !empty($enf_model)){
    $data->execute([$enf_status, $enf_model, $enf_procedure, $enf_id, $enf_nv, $enf_nf, $enf_problem, $enf_gid]) or die(print_r($db->errorInfo(), true));
    header("Location: {$_SERVER['HTTP_REFERER']}");
  } else {
    header("Location: /manager/manager.php?nfe&error");
  }

?>
