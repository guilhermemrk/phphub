<?php
session_start();
include_once './src/db/connect.php';
$data = $db->prepare("SELECT theme FROM hub_users WHERE username=?");
$data->execute([$_SESSION["username"]]);
$row = $data->fetch();
if ($row["theme"] == 0 || $row["theme"] == 1) {
    echo "<nav class='navbar is-dark' role='navigation' aria-label='main navigation'></nav>
        <nav class='navbar is-dark is-fixed-top' role='navigation' aria-label='main navigation'>";
} elseif ($row["theme"] == 2) {
    echo "<nav class='navbar is-light' role='navigation' aria-label='main navigation'></nav>
        <nav class='navbar is-light is-fixed-top' role='navigation' aria-label='main navigation'>";
}
echo <<<HTML
<div id='navbarBasicExample' class='navbar-menu'>
    <div class='navbar-start'>
      <a class='navbar-item' href='./'>
        Home
      </a>
HTML;
if (!is_NULL($sUsername)) {
    echo <<<HTML
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
        <div class='navbar-item has-dropdown is-hoverable'>
          <a class='navbar-link' href='./manager.php'>
            Utilidades
          </a>
          <div class='navbar-dropdown'>
            <a class='navbar-item' href='https://secure.logmein.com/hamachi/ih1.asp?lang=bp&c=yefhq40uuc8lap2oadxg49v2wosabluo9r0315gh'>
              <strike>Anotações</strike>
            </a>
          <hr class='navbar-divider'>
            <a class='navbar-item' href='https://secure.logmein.com/hamachi/ih1.asp?lang=bp&c=yefhq40uuc8lap2oadxg49v2wosabluo9r0315gh'>
              Hamachi
            </a>
          </div>
        </div>
        <a class='navbar-item' href='./graph.php'>
          <strike>Resumo</strike>
        </a>

      </div>
      <div class='navbar-end'>
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
                    </a>
HTML;
    if ($row["theme"] == 0 || $row["theme"] == 1) {
        echo "<a href='./src/bit/core/core_themeswitch.php' class='navbar-item'>
                              Light Theme
                            </a>";
    } elseif ($row["theme"] == 2) {
        echo "<a href='./src/bit/core/core_themeswitch.php' class='navbar-item'>
                              Dark Theme
                            </a>";
    }
    <<<HTML
    <hr class='navbar-divider'>
                    <a href='/manager/src/post/hp_logout.php' class='navbar-item'>
                      <strong>Sair</strong>
                    </a>
                  </div>
                </div>
            </div>
HTML;
} else {
    echo <<<HTML
  </div>
  <div class='navbar-end'>
    <div class='navbar-item'>
      <div class='buttons'>
        <a href='/manager/login.php' class='button is-primary'>
          Login
        </a>
      </div>
    </div>
  </div>
HTML;
}
echo <<<HTML
</div>
</nav>
HTML;
?>
