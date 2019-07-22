<?php
session_start();
include_once './src/db/connect.php';
$data = $db->prepare("SELECT theme FROM hub_users WHERE username=?");
$data->execute([$_SESSION["username"]]);
$row = $data->fetch();

  echo "<div class='cSpaceAfterHeaderMenu'>";
  if ($row['theme'] == 0 || $row['theme'] == 1){
    echo "<footer class='footer is-dark'>";
  } elseif ($row['theme'] == 2){
    echo "<footer class='footer is-primary'>";
  }
  echo "<div class='content has-text-centered'>
    <p>
      Developed by <strong>Akai#0001</strong> - 2019.<br />
      All rights reserved.
    </p>
  </div>
</footer>
</div>";
?>
