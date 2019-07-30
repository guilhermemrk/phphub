<?php
  include_once './src/bit/login/login_verification.php';
  include './../db/connect.php';

  $c_id = $_GET["id"];
  $isNfe = $_GET["isNfe"];
  $solution = $_POST["entrySolution"];

  $data = $db->prepare("UPDATE man_manager SET status=?, solution=? WHERE entryid=?");

if (is_NULL($isNfe)){
  $data->execute([0, utf8_decode($solution), $c_id]) or die(print_r($db->errorInfo(), true));
  header("Location: {$_SERVER['HTTP_REFERER']}");
} else {
  $data->execute([20, utf8_decode($solution), $c_id]) or die(print_r($db->errorInfo(), true));
  header("Location: {$_SERVER['HTTP_REFERER']}");
}
?>
