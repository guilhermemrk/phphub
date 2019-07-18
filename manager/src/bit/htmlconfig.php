<?php
  define('TIMEZONE', 'America/Cuiaba');
  date_default_timezone_set(TIMEZONE);
  header('Content-Type: text/html; charset=utf-8');
  echo '<meta http-equiv="Content-type" content="text/html; charset=utf-8" />';
  echo '<meta charset="UTF-8">';
  echo '<link rel="stylesheet" href="./src/css/bulma.css">';
  echo '<link rel="stylesheet" href="./src/css/bulma_overwrite.css">';
  echo '<link rel="stylesheet" href="./src/css/style.css">';
  echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
  echo '<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>';
  echo "<script src='./src/js/jQuery.js' charset='utf-8'></script>";
  echo "<script src='./src/js/script.js' charset='utf-8'></script>";
?>
