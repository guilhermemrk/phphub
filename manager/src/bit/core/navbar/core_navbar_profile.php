<?php

include './src/db/connect.php';
$util = $db->query("SELECT * FROM man_menuitems WHERE menuid=3 ORDER BY itemOrder ASC LIMIT 10");

echo "<div class='navbar-item has-dropdown is-hoverable is-dark'>
  <a class='navbar-link'>
    Olá, ${sUsername}!
  </a>
  <div class='navbar-dropdown'>";
  while ($item = $util->fetch()){
    echo "<a class='navbar-item' href='$item[itemLink]'>" . utf8_encode($item["itemName"]) . "</a>";
  }

    if ($row["theme"] == 0 || $row["theme"] == 1){
      echo "<a href='./src/bit/core/core_themeswitch.php' class='navbar-item'>
              <span class='icon is-small'><i class='fas fa-sun'></i></span>&nbsp;&nbsp;Light Theme
            </a>";
    } elseif ($row["theme"] == 2){
      echo "<a href='./src/bit/core/core_themeswitch.php' class='navbar-item'>
              <span class='icon is-small'><i class='fas fa-moon'></i></span>&nbsp;&nbsp;Dark Theme
            </a>";
    }

    echo "<hr class='navbar-divider'>
    <a href='/manager/src/post/hp_logout.php' class='navbar-item'>
      <strong>Sair</strong>
    </a>
  </div>";

?>
