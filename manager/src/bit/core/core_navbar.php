<?php

session_start();
$sUsername = $_SESSION["login"][0];

include_once './src/db/connect.php';
$data = $db->prepare("SELECT theme FROM hub_users WHERE username=$sUsername");
$data->execute();
$row = $data->fetch();

if ($row["theme"] == 0 || $row["theme"] == 1){
  echo "<nav class='navbar is-dark' role='navigation' aria-label='main navigation'></nav>
  <nav class='navbar is-dark is-fixed-top' role='navigation' aria-label='main navigation'>";
} elseif ($row["theme"] == 2){
  echo "<nav class='navbar is-light' role='navigation' aria-label='main navigation'></nav>
  <nav class='navbar is-light is-fixed-top' role='navigation' aria-label='main navigation'>";
}

  echo "<div id='navbarBasicExample' class='navbar-menu'>
    <div class='navbar-start'>
      <a class='navbar-item' href='./'>
        Home
      </a>";

      if (!is_NULL($sUsername)){ include './src/bit/core/navbar/core_navbar_manager.php'; }
      if (!is_NULL($sUsername)){ include './src/bit/core/navbar/core_navbar_util.php'; }

      echo "<!--a class='navbar-item' href='./graph.php'>
        Resumo
      </a-->
    </div>";

    if (!is_NULL($sUsername)){
  echo "<div class='navbar-end'>
          <div class='navbar-item'>";

          include './src/bit/core/navbar/core_navbar_profile.php';

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
