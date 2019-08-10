<?php
function formatProblem($text, $p_pattern, $maxlen){
  // '/(.{90})(.*)/'
  if (strlen($text) >= $maxlen){ $result = preg_replace($p_pattern, "$1...", $text); }
  else { $result = $text; }

  if (is_NULL($text) || empty($text)){
    return "Não infomado.";
  } else {
    return ucfirst(utf8_encode($result));
  }
}
?>
