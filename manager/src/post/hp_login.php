<?php
  session_start();
  include './../db/connect.php';

  if (empty($_POST['lusername']) || empty($_POST['lpass'])){
    header("Location: /manager/login.php?failed");
    exit();
  }

  $username = mysqli_real_escape_string($conn, $_POST['lusername']);
  $password = mysqli_real_escape_string($conn, $_POST['lpass']);

  $sql = "SELECT username, pass, isActivated FROM users WHERE username='${username}' AND pass=md5('${password}') AND isActivated=1";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_num_rows($result);

  if ($row == 1){
    $_SESSION["username"] = $username;
    header("Location: /manager/");
    exit();
  } else {
    header("Location: /manager/login.php?failed");
    exit();
  }

  mysqli_close($conn);
?>
