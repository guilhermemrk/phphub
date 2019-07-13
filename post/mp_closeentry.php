<?php
  include './../db/connect.php';

  $c_id = $_GET["id"];

  $sql = "UPDATE manager SET status=0 WHERE entryid=$c_id";

  if (mysqli_query($conn, $sql)){
    echo "Closed the entry number $c_id successfully.";
    header("Location: ./../manager.php");
  } else {
    echo "ERROR: Could not execute [$sql]. " . mysqli_error($conn);
  }

  mysqli_close($conn);
?>
