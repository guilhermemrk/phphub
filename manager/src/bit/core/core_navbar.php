<?php
  session_start();
  $sUsername = $_SESSION["username"];

  echo "<nav class='navbar is-dark' role='navigation' aria-label='main navigation'>
  <div id='navbarBasicExample' class='navbar-menu'>
    <div class='navbar-start'>
      <a class='navbar-item' href='./'>
        Home
      </a>
      <a class='navbar-item' href='./manager.php'>
        Manager
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
      <!--div class='navbar-item has-dropdown is-hoverable'>
        <a class='navbar-link'>
          None
        </a>
        <div class='navbar-dropdown'>
          <a class='navbar-item'>
            About
          </a>
          <a class='navbar-item'>
            Jobs
          </a>
          <a class='navbar-item'>
            Contact
          </a>
          <hr class='navbar-divider'>
          <a class='navbar-item'>
            Report an issue
          </a>
        </div-->
      </div>
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
                <a href='/manager/user/profile.php?id=$a' class='navbar-item'>
                  Perfil
                </a>
                <a href='#' class='navbar-item'>
                  Configurações
                </a>
                <hr class='navbar-divider'>
                <a href='/manager/src/post/hp_logout.php' class='navbar-item'>
                  <strong>Logout</strong>
                </a>
              </div>
            </div>
    <!--div class='navbar-item'>
      <div class='buttons'>
        <a href='/manager/src/post/hp_logout.php' class='button is-danger'>
          <strong>Logout</strong>
        </a>
      </div>
    </div-->
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
