<?php
  session_start();
  include_once './src/db/connect.php';
  $data = $db->prepare("SELECT theme FROM hub_users WHERE username=?");
  $data->execute([$_SESSION["username"]]);
  $row = $data->fetch();

  define('TIMEZONE', 'America/Cuiaba');
  date_default_timezone_set(TIMEZONE);
  header('Content-Type: text/html; charset=utf-8');
  echo '<meta http-equiv="Content-type" content="text/html; charset=utf-8" />';
  echo '<meta charset="UTF-8">';
  echo '<link rel="stylesheet" href="./src/css/bulma.css">';
  echo '<link rel="stylesheet" href="./src/css/common.css">';
  if ($row['theme'] == 0 || $row['theme'] == 1){ // dark
    echo '<link rel="stylesheet" href="./src/css/dark/bulma_overwrite.css">';
    echo '<link rel="stylesheet" href="./src/css/dark/style.css">';
  } elseif ($row['theme'] == 2) { // light
    echo '<link rel="stylesheet" href="./src/css/light/bulma_overwrite.css">';
    echo '<link rel="stylesheet" href="./src/css/light/style.css">';
  }
  echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
  echo '<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>';
  echo "<script src='./src/js/jQuery.js' charset='utf-8'></script>";
  echo "<script src='./src/js/script.js' charset='utf-8'></script>";
?>
