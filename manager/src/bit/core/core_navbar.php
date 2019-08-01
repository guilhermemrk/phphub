<?php

session_start();
include_once './src/db/connect.php';
$data = $db->prepare("SELECT theme FROM hub_users WHERE username=?");
$data->execute([$_SESSION["username"]]);
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
      </a>
      <div class='navbar-item has-dropdown is-hoverable'>
        <a class='navbar-link' href='./manager.php'>
          Gerenciador
        </a>
        <div class='navbar-dropdown'>
          <a class='navbar-item' href='./manager.php'>
            Ocorrências
          </a>
          <a class='navbar-item' href='./manager.php?nfe'>
            NFe
          </a>
          <a class='navbar-item' href='./manager.php?entity'>
            Entidades
          </a>
          <a class='navbar-item' href='./manager.php?sped'>
            SPED
          </a>
        </div>
      </div>
      <a class='navbar-item' href='./notes.php'>
        <strike>Anotações</strike>
      </a>
      <a class='navbar-item' href='./graph.php'>
        <strike>Resumo</strike>
      </a>

    </div>

    ";

    if (!is_NULL($sUsername)){
  echo "<div class='navbar-end'>
          <div class='navbar-item'>
            <div class='navbar-item has-dropdown is-hoverable is-dark'>
              <a class='navbar-link'>
                Olá, ${sUsername}!
              </a>
              <div class='navbar-dropdown'>
                <a href='#' class='navbar-item'>
                  <strike>Perfil</strike>
                </a>
                <a href='#' class='navbar-item'>
                  <strike>Configurações</strike>
                </a>";

                if ($row["theme"] == 0 || $row["theme"] == 1){
                  echo "<a href='./src/bit/core/core_themeswitch.php' class='navbar-item'>
                          Light Theme
                        </a>";
                } elseif ($row["theme"] == 2){
                  echo "<a href='./src/bit/core/core_themeswitch.php' class='navbar-item'>
                          Dark Theme
                        </a>";
                }

                echo "<hr class='navbar-divider'>
                <a href='/manager/src/post/hp_logout.php' class='navbar-item'>
                  <strong>Sair</strong>
                </a>
              </div>
            </div>
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
