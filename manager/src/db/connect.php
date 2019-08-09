<?php
  $now = new DateTime();
  $mins = $now->getOffset() / 60;
  $sgn = ($mins < 0 ? -1 : 1);
  $mins = abs($mins);
  $hrs = floor($mins / 60);
  $mins -= $hrs * 60;
  $offset = sprintf('%+d:%02d', $hrs*$sgn, $mins);

  //Your DB Connection - sample
  $db = new PDO('mysql:host=localhost;dbname=hub', 'root', 'admindb123');
  $db->exec("SET time_zone='$offset';");

  if (!$db){
    echo 'Não conectado ao banco de dados.';
  }

?>
