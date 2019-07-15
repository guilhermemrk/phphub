<?php
  $id = $_GET['id'];
  $sql = "SELECT * FROM manager WHERE entryid=$id";

  if ($results = $conn->query($sql)){
    echo "<div class='options'>";
    while($row = $results->fetch_assoc()){
      if ($row['status'] >= 1){
        echo "<div class='mopt-right'>
            <a href='./editentry.php?id={$a}'><img src='./src/images/edit.png' /></a>
        </div>
        <div class='mopt-right'>
            <a href='./closeentry.php?id={$a}'><img src='./src/images/delete.png' /></a>
        </div>";
      } else {
        echo "<div class='mopt-right'>
            <a href='./editentry.php?id={$a}'><img src='./src/images/edit.png' /></a>
        </div>";
      }
    }
    echo "</div>";
  }
?>
