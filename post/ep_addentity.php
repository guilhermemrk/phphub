<?php
  include './../db/connect.php';

  $aen_company = $_POST['companyn'];
  $aen_phone = $_POST['phone'];
  $aen_email = $_POST['email'];
  $aen_aemail = $_POST['aemail'];
  $aen_city = $_POST['city'];

  $sql = "INSERT INTO entity (companyName, phone, emailPrimary, emailAccountant, addedBy, city) VALUES ('$aen_company', '$aen_phone', '$aen_email', '$aen_aemail', 'ADM', '$aen_city')";

  if (mysqli_query($conn, $sql)){
    echo "Entry successfully added!";
    header("Location: ./../entity.php");
  } else {
    echo "ERROR: Could not execute [$sql]. " . mysqli_error($conn);
  }

  mysqli_close($conn);
?>
