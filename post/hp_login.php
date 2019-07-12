<?php

  include './../db/connect.php';

  $username = $_POST['name'];
  $password = md5($_POST['password']);
  $submit = $_POST['submit'];

  $sql = "SELECT * FROM users WHERE username='$username' AND pass='$password'";
  $verify = mysql_query($conn, $sql);

  if ($verify){
    $rows = mysql_fetch_assoc($verify);
    if (mysql_num_rows($rows) <= 0){
        echo "ERROR!";
        header("Location: ./index.php");
      } else {
        // if ($rows["isActive"] == 1){
          setcookie("login", $username);
          header("Location: ./manager.php");
        // } else {
        //   echo "ERROR!";
        //   header("Location: ./index.php");
        // }
      }
    }

  mysqli_close($conn);
?>
