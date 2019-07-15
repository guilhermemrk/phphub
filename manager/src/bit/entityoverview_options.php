<?php

  include './../db/connect.db';

  $sql = "SELECT * FROM entity WHERE status=1";

  if ($results = $conn->query($sql)){
    echo "<select class='textarea' name='companyid' id='companyid'>";
    while ($row = $results->fetch_assoc()){
      echo "<option value='" . $row['companyid'] . "'>". utf8_encode($row['companyName']) . "</option>";
    }
    echo "</select>";
  }
  echo "
  <div class='options'>
    <div class='mopt-right'>
        <a href='./profile_edit.php?id=$a'><img src='./src/images/edit.png' /></a>
    </div>
  </div>
  ";
?>
