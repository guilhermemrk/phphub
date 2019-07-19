<?php
  include_once './src/bit/login_verification.php';
  include './../db/connect.php';

  $c_id = $_GET["id"];
  $isNfe = $_GET["isNfe"];

  $data = $db->prepare("UPDATE man_manager SET status=? WHERE entryid=?");

if (is_NULL($isNfe)){
  $data->execute([0,$c_id]) or die(print_r($db->errorInfo(), true));
  header("Location: {$_SERVER['HTTP_REFERER']}");
} else {
  $data->execute([20,$c_id]) or die(print_r($db->errorInfo(), true));
  header("Location: {$_SERVER['HTTP_REFERER']}");
}
?>
