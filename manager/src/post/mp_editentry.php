<?php
  include_once './src/bit/login/login_verification.php';
  include './../db/connect.php';

  $ee_id = $_GET['id'];
  $ee_status = $_POST['edit_entryStatus'];
  $ee_problem = utf8_decode($_POST['edit_entryProblem']);
  $ee_solution = utf8_decode($_POST['edit_entrySolution']);
  $category = $_POST["edit_entryCategory"];

  $data = $db->prepare("UPDATE man_manager SET problem=?, status=?, solution=?, category=? WHERE entryid=?");

  if (!empty($ee_id) || !empty($ee_status) || !empty($ee_problem)){
    $data->execute([$ee_problem, $ee_status, $ee_solution, $category, $ee_id]) or die(print_r($db->errorInfo(), true));
    header("Location: {$_SERVER['HTTP_REFERER']}");
  } else {
    header("Location: /manager/manager.php?error");
  }

?>
