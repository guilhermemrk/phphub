<?php
  include_once './src/bit/login_verification.php';
  include './../db/connect.php';

  $c_id = $_GET["id"];
  $isNfe = $_GET["isNfe"];

if (is_NULL($isNfe)){
  $sql = "UPDATE manager SET status=0 WHERE entryid=$c_id";
} else {
  $sql = "UPDATE manager SET status=20 WHERE entryid=$c_id";
}

if (mysqli_query($conn, $sql)){
    echo "Closed the entry number $c_id successfully.";
    header("Location: {$_SERVER['HTTP_REFERER']}");
} else {
    echo "ERROR: Could not execute [$sql]. " . mysqli_error($conn);
}

  mysqli_close($conn);
?>
