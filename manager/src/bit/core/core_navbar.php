<?php

session_start();
$sUsername = $_SESSION["login"][0];
$sUsergroup = $_SESSION["login"][1];

include './src/db/connect.php';
$data = $db->prepare("SELECT theme FROM hub_users WHERE username=?");
$data->execute([$_SESSION["login"][0]]);
$row = $data->fetch();

if ($row["theme"] <= 1){
  echo "<nav class='navbar is-dark' role='navigation' aria-label='main navigation'></nav>
  <nav class='navbar is-dark is-fixed-top' role='navigation' aria-label='main navigation'>";
} elseif ($row["theme"] == 2){
  echo "<nav class='navbar is-light' role='navigation' aria-label='main navigation'></nav>
  <nav class='navbar is-light is-fixed-top' role='navigation' aria-label='main navigation'>";
}

include './src/bit/core/functions/f_navbar.php';

  echo "<div id='navbarBasicExample' class='navbar-menu'>
    <div class='navbar-start'>
      <a class='navbar-item' href='./'>
        Home
      </a>";

      if (!is_NULL($sUsername)){ navbarList('Gerenciador', 1, 0); }
      if (!is_NULL($sUsername)){ navbarList('Utilidades', 2, $sUsergroup); }

      echo "</div>";

    if (!is_NULL($sUsername)){
  echo "<div class='navbar-end'>
          <div class='navbar-item'>";

          navbarList("Olá, $sUsername!", 3, 0);

            echo "</div>
        </div>";
} else {
  echo "<div class='navbar-end'>
    <div class='navbar-item'>
      <div class='buttons'>
        <a href='/manager/login.php' class='button is-primary'>
          Login
        </a>
      </div>
    </div>
  </div>";
}

echo "
  </div>
</nav>";
?>
