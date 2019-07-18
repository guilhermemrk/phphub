<?php
  $db_servername = 'localhost:3306';
  $db_username = 'root';
  $db_password = 'admindb123';
  $db_name = 'managerdb';

  $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);

  if ($conn === false){
    die('Connection failed: ' . mysqli_connect_error());
  }


?>
