<?php
  session_start();
  $sUsername = $_SESSION["username"];

  if (is_NULL($sUsername)){
    header("Location: /manager/login.php");
  }
?>
