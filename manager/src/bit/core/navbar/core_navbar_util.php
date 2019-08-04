<?php

$sUsergroup = $_SESSION["login"][1];

include './src/db/connect.php';
$util = $db->query("SELECT * FROM man_menuitems WHERE menuid=3 AND menuGroup=$sUsergroup ORDER BY itemOrder ASC LIMIT 10");

echo "<div class='navbar-item has-dropdown is-hoverable'>
<a class='navbar-link'>
  Utilidades
</a>
  <div class='navbar-dropdown'>";
while ($item = $util->fetch()){
  echo "<a class='navbar-item' href='$item[itemLink]'>" . utf8_encode($item["itemName"]) . "</a>";
}
echo "</div>
</div>";

?>
