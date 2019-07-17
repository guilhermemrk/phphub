<?php
  include_once './src/bit/login_verification.php';
  include './../db/connect.php';

  $ee_id = $_GET['id'];
  $ee_status = $_POST['edit_entryStatus'];
  $ee_problem = $_POST['edit_entryProblem'];

  $sql = "UPDATE manager SET problem='$ee_problem', status='$ee_status' WHERE entryid='$ee_id'";

  if (mysqli_query($conn, $sql)){
    echo "Entry successfully added!";
    header("Location: {$_SERVER['HTTP_REFERER']}");
  } else {
    echo "ERROR: Could not execute [$sql]. " . mysqli_error($conn);
  }

  mysqli_close($conn);
?>
