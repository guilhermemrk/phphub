<?php

  include './../db/connect.php';

  $f_name = $_POST['name'];
  $f_pass = $_POST['password'];
  $h_pass = password_hash($f_pass, PASSWORD_DEFAULT);

  $sql = "SELECT * FROM config WHERE username={$f_name}";

  if($result = mysqli_query($conn, $sql)){
    if (password_verify($h_pass, $result['pass'])) {
        echo "Logged in!";
    }
    else {
        echo "Invalid credentials";
    }
  }

  mysqli_close($conn);
?>
