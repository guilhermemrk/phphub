<?php
  // Phone
  function formatPhone($dbPhone){
    $p_pattern10 = '/(\d{2})(\d{4})(\d*)/'; // 12 1234-5678
    $p_pattern11 = '/(\d{2})(\d{5})(\d*)/'; // 12 12345-6789
    $p_pattern13 = '/(\d{3})(\d{2})(\d{4})(\d*)/'; // 014 12 1234-5678
    $p_pattern14 = '/(\d{3})(\d{2})(\d{5})(\d*)/'; // 014 12 12345-6789

    if (is_NULL($dbPhone) || $dbPhone == ''){
      $vResult = "<span style='color: #696969;'>Não informado.</span>";
    } elseif (strlen($dbPhone) == 10) {
      $vResult = preg_replace($p_pattern10, "($1) $2-$3", $dbPhone);
    } elseif (strlen($dbPhone) == 11) {
      $vResult = preg_replace($p_pattern11, "($1) $2-$3", $dbPhone);
    } elseif (strlen($dbPhone) == 13) {
      $vResult = preg_replace($p_pattern13, "$1 ($2) $3-$4", $dbPhone);
    } elseif (strlen($dbPhone) == 14) {
      $vResult = preg_replace($p_pattern14, "$1 ($2) $3-$4", $dbPhone);
    } else {
      $vResult = "<span style='color: #696969;'>Não informado.</span>";
    }
    return $vResult;
  }

  // Email
  function formatEmail($dbEmail){
    if (is_NULL($dbEmail) || $dbEmail == ''){
      $eResult = "<span style='color: #696969;'>Não informado.</span>";
    } else {
      $eResult = "<a href='mailto:$dbEmail'>$dbEmail</a>";
    }
    return $eResult;
  }
?>
