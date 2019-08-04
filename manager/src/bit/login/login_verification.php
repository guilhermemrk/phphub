<?php
  session_start();
  $session = $_SESSION['login'];
  $sUsername = $session[0];
  $sUsergroup = $session[1];

  if (is_NULL($sUsername)){
    header("Location: /manager/login.php?loginexpired");
  }
?>
