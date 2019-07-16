<?php
  $session = 1;

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
      <a class='navbar-item' href='./entity.php'>
        Entidades
      </a>
      <a class='navbar-item' href='#'>
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

if ($session == 1) {
  echo "<div class='navbar-end'>
    <div class='navbar-item'>
      <div class='buttons'>
        <a class='button is-danger'>
          <strong>Logout</strong>
        </a>
      </div>
    </div>
  </div>";
} else {
  echo "<div class='navbar-end'>
    <div class='navbar-item'>
      <div class='buttons'>
        <a class='button is-primary'>
          <strong>Sign up</strong>
        </a>
        <a class='button is-light'>
          Log in
        </a>
      </div>
    </div>
  </div>";
}

echo "
  </div>
</nav>";
?>
