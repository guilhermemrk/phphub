<?php
  session_start();
  $sUsername = $_SESSION["username"][1];
  $sUsergroup = $_SESSION["username"][2];

  if (is_NULL($sUsername)){
    header("Location: /manager/login.php?loginexpired");
  }
?>
