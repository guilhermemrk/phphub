<?php
session_start();

include './../../db/connect.php';

$userTheme = $db->prepare("SELECT theme FROM hub_users WHERE username=?");
$userTheme->execute([$_SESSION["username"]]);
$row = $userTheme->fetch();

if ($row["theme"] == 0 || $row["theme"] == 1){
  $theme = '';
} elseif ($row["theme"] == 2) {
  $theme = 'is-dark';
}
?>
