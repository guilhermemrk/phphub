<?php
  include './../db/connect.php';

  $ae_companyid = $_POST['companyid'];
  $ae_status = $_POST['status'];
  $ae_problem = utf8_encode($_POST['problem']);

  $sql = "INSERT INTO manager (companyid, problem, status) VALUES ('$ae_companyid', '$ae_problem', '$ae_status')";

  if (mysqli_query($conn, $sql)){
    echo "Entry successfully added!";
    header("Location: {$_SERVER['HTTP_REFERER']}");
  } else {
    echo "ERROR: Could not execute [$sql]. " . mysqli_error($conn);
  }

  mysqli_close($conn);
?>
