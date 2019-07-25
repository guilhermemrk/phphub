<?php

function format($format){ // 2019-07-12 21:02:24

  $d_pattern1 = '/[-: ](\d{4})(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/';
  $d_pattern2 = '/(\d{4})(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/';
  $t_pattern = '/(\d{2})(\d{4})(\d*)/';

  $Result1 = preg_replace($d_pattern1, "$3 $2 $1", $format);

  return $Result1;
}


echo format('2019-07-12 21:02:24');


?>
