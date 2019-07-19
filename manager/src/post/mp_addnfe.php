<?php
  session_start();
  include_once './src/bit/login_verification.php';
  include './../db/connect.php';

    $sUsername = $_SESSION["username"];
    $anfe_company = $_POST["companyid"];
    $anfe_status = $_POST["status"];
    $anfe_model = $_POST["nfe_model"];
    $anfe_id = $_POST["nfe_id"];
    $anfe_nv = $_POST["nfe_nv"];
    $anfe_nf = $_POST["nfe_nf"];
    $anfe_problem = utf8_encode($_POST["problem"]);
    $anfe_procedure = $_POST["nfe_procedure"];

    $data = $db->prepare("INSERT INTO man_manager (companyid, status, nfe_modelo, nfe_todo, nfe_id, nfe_nv, nfe_nf, problem, addedBy) VALUES (?,?,?,?,?,?,?,?,?)");

    if (!empty($anfe_company) || !empty($anfe_status) || !empty($anfe_model) || !empty($anfe_id) || !empty($anfe_nv) || !empty($anfe_nf) || !empty($anfe_procedure) || !empty($sUsername)){
      $data->execute([$anfe_company, $anfe_status, $anfe_model, $anfe_procedure, $anfe_id, $anfe_nv, $anfe_nf, $anfe_problem, $sUsername]) or die(print_r($db->errorInfo(), true));
      header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {
      header("Location: /manager/manager.php?nfe&error");
    }

?>
