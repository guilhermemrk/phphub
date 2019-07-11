<?php

  include './../db/connect.php';

  $f_name = $_POST['name'];
  $f_email = $_POST['email'];
  $f_pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $sql = "INSERT INTO config (username, email, pass) VALUES ('$f_name', '$f_email', '$f_pass')";

  if(mysqli_query($conn, $sql)){
    echo "Successfully added to the database!";
    header("Location: ./../index.php");
  } else {
    echo "ERROR: Could not execute [$sql]. " . mysqli_error($conn);
  }

  mysqli_close($conn);

?>
