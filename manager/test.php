<?php
session_start();
include_once './src/db/connect.php';
$data = $db->prepare("SELECT theme FROM hub_users WHERE username=?");

$data->execute([$_SESSION["username"]]);

$row = $data->fetch();

echo $row['theme'];

?>
