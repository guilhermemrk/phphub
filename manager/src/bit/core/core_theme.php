<?php
session_start();

include './../../db/connect.php';

$userTheme = $db->prepare("SELECT theme FROM hub_users WHERE username=?");
$userTheme->execute([$_SESSION["login"][0]]);
$themeselected = $userTheme->fetch();

if ($themeselected["theme"] == 0 || $themeselected["theme"] == 1){
  $theme = '';
} elseif ($themeselected["theme"] == 2) {
  $theme = 'is-dark';
}
?>
