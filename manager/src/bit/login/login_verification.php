<?php
  session_start();
  $sUsername = $_SESSION["username"];
  // $sUserid = $_SESSION["userid"];

  if (is_NULL($sUsername)){
    header("Location: /manager/login.php?loginexpired");
  }
?>
