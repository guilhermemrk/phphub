<?php
  include './../db/connect.php';

  $ae_companyid = $_POST['companyid'];
  $ae_urgency = $_POST['urgency'];
  $ae_problem = $_POST['problem'];
  $ae_date = date('Y/m/d H:i:s');

  $sql = "UPDATE manager SET status=0";

  if (mysqli_query($conn, $sql)){
    echo "Closed all the entries successfully.";
    header("Location: ./../manager.php");
  } else {
    echo "ERROR: Could not execute [$sql]. " . mysqli_error($conn);
  }

  mysqli_close($conn);
?>
