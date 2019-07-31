<?php

session_start();
include_once './src/db/connect.php';
$data = $db->prepare("SELECT theme FROM hub_users WHERE username=?");
$data->execute([$_SESSION["username"]]);
$row = $data->fetch();

if ($row["theme"] == 0 || $row["theme"] == 1){
  echo "<nav class='navbar is-dark' role='navigation' aria-label='main navigation'>";
} elseif ($row["theme"] == 2){
  echo "<nav class='navbar is-light' role='navigation' aria-label='main navigation'>";
}

  echo "<div id='navbarBasicExample' class='navbar-menu'>
    <div class='navbar-start'>
    <div class='navbar-item has-dropdown is-hoverable'>
      <a class='navbar-link' href='./manager.php'>
        Ocorrências
      </a>
      <div class='navbar-dropdown'>
        <a class='navbar-item' href='./manager.php'>
          Urgentes
        </a>
        <a class='navbar-item' href='./manager.php?nfe'>
          Pendentes
        </a>
        <a class='navbar-item' href='./manager.php?entity'>
          Finalizadas
        </a>
      </div>
    </div>";

    echo "<div class='navbar-item has-dropdown is-hoverable'>
      <a class='navbar-link' href='./manager.php'>
        NFe/NFCe
      </a>
      <div class='navbar-dropdown'>
        <a class='navbar-item' href='./manager.php'>
          Urgentes
        </a>
        <a class='navbar-item' href='./manager.php?nfe'>
          Pendentes
        </a>
        <a class='navbar-item' href='./manager.php?entity'>
          Finalizadas
        </a>
      </div>
    </div>";

    echo "<div class='navbar-item has-dropdown is-hoverable'>
      <a class='navbar-link' href='./manager.php'>
        Entidades
      </a>
      <div class='navbar-dropdown'>
        <a class='navbar-item' href='./manager.php'>
          Ativas
        </a>
        <a class='navbar-item' href='./manager.php?nfe'>
          Inativas
        </a>
      </div>
    </div>";

    echo "<div class='navbar-item has-dropdown is-hoverable'>
      <a class='navbar-link' href='./manager.php'>
        SPED
      </a>
      <div class='navbar-dropdown'>
        <a class='navbar-item' href='./manager.php'>
          Pendentes
        </a>
        <a class='navbar-item' href='./manager.php?nfe'>
          Enviados
        </a>
      </div>
    </div>";

    echo "</div>
  </div>
</nav>";
?>
