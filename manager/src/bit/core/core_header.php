<?php

session_start();
include_once './src/db/connect.php';
$data = $db->prepare("SELECT theme FROM hub_users WHERE username=?");
$data->execute([$_SESSION["username"]]);
$row = $data->fetch();

if ($row['theme'] == 0 || $row['theme'] == 1){
  echo "<section class='hero is-dark is-bold'>";
} elseif ($row['theme'] == 2){
  echo "<section class='hero is-primary is-bold'>";
}
  echo "<div class='hero-body'>
          <div class='container'>
            <h1 class='title'>
              " . $section_title . "
            </h1>
            <h2 class='subtitle'>
              " . $page_title . "
            </h2>
          </div>
        </div>
      </section>";
?>
