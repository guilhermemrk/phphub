<?php
session_start();
include_once './src/db/connect.php';
$data = $db->prepare("SELECT theme FROM hub_users WHERE username=?");
$data->execute([$_SESSION["login"][0]]);
$row = $data->fetch();

  echo "<div class='cSpaceAfterHeaderMenu'>";
  if ($row['theme'] == 0 || $row['theme'] == 1){
    echo "<footer class='footer is-dark'>";
  } elseif ($row['theme'] == 2){
    echo "<footer class='footer is-primary'>";
  }
  echo "<div class='content has-text-centered'>
    <p>
      Manager v1.2
    </p>
  </div>
</footer>
</div>";

//       Developed by Akai#0001 - 2019.
//           All rights reserved.
?>
