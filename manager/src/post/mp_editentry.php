<?php
  include './../db/connect.php';

  $ee_id = $_GET['id'];
  $ee_status = $_POST['status'];
  $ee_problem = $_POST['problem'];

  $sql = "UPDATE manager SET problem='$ee_problem', status='$ee_status' WHERE entryid='$ee_id'";

  if (mysqli_query($conn, $sql)){
    echo "Entry successfully added!";
    header("Location: ./../../manager.php");
  } else {
    echo "ERROR: Could not execute [$sql]. " . mysqli_error($conn);
  }

  mysqli_close($conn);
?>
