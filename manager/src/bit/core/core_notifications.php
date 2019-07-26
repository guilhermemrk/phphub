<?php

// Login
$loginerror = $_GET["loginerror"];
$loginexpired = $_GET["loginexpired"];
$logout = $_GET["logout"];
// $firstlogin = $_GET["firstlogin"];

// Manager
$error = $_GET["error"];

if (!is_NULL($loginerror)){
  echo '
  <div class="notification is-danger">
  <button class="delete"></button>
  Credenciais inválidas!
  </div>
  ';
} elseif (!is_NULL($loginexpired)){
  echo '
  <div class="notification is-warning">
  <button class="delete"></button>
  Sua sessão expirou.
  </div>
  ';
} elseif (!is_NULL($logout)){
  echo '
  <div class="notification is-primary">
  <button class="delete"></button>
  Deslogado com sucesso!
  </div>
  ';
}

if (!is_NULL($error)){
  echo '
  <div class="notification is-danger">
  <button class="delete"></button>
  Ocorreu um erro! Tente novamente mais tarde.
  </div>
  ';
}

// if (!is_NULL($firstlogin)){
//   echo "
//   <div class='notification is-info'>
//   <button class='delete'></button>
//     Bem vindo de volta, $sUsername!
//   </div>
//   ";
// }
 ?>
