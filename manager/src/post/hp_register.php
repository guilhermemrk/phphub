<?php

include_once './src/bit/login_verification.php';
  include './../db/connect.php';

  $f_name = $_POST['name'];
  $f_email = $_POST['email'];
  $f_pass = md5($_POST['password']);

  $sql = "INSERT INTO users (username, email, pass, addedBy) VALUES ('$f_name', '$f_email', '$f_pass', 'ADM')";

  if(mysqli_query($conn, $sql)){
    echo "Successfully added to the database!";
    header("Location: ./../../index.php");
  } else {
    echo "ERROR: Could not execute [$sql]. " . mysqli_error($conn);
  }

  mysqli_close($conn);

?>
