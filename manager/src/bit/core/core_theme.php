<?php
session_start();

include './../../db/connect.php';

$userTheme = $db->prepare("SELECT theme FROM hub_users WHERE username=?");
$userTheme->execute([$_SESSION["username"]]);
$themeid = $userTheme->fetch();

if ($themeid["theme"] == 0 || $themeid["theme"] == 1){
  $theme = '';
} elseif ($themeid["theme"] == 2) {
  $theme = 'is-dark';
}
?>
