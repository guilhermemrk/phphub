<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
      // Make so the entry get status=2 if a day has passed
      include './db/connect.php';
      include './bit/htmlconfig.php';

      $page_title = 'Manager';
      echo "<title>{$page_title}</title>";
    ?>
  </head>
  <body>
    <?php
      include './bit/header.php';
      include './bit/navbar.php';
    ?>
    <div class="container-nostyle">
        <?php
          include './bit/manager_options.php';

          $sql = "SELECT * FROM manager AS m JOIN entity AS e ON m.companyid = e.companyid ORDER BY status DESC, entryDate ASC";

          if ($results = $conn->query($sql)){
            echo "<table style='width:100%; text-align: center;'><tr class='tropen' style='color: #F9F9F9 !important;'><th>ID</th><th>Company</th><th>Entry Date</th><!--th>Expire Date</th--><th>Problem</th><th>Close</th><th>Edit</th></tr>";

            while ($row = $results->fetch_assoc()){
              $a = $row["entryid"];
              $b = $row["companyid"];
              $ba = $row["companyName"];
              $c = $row["problem"];
              $d = $row["status"];
              $e = $row["entryDate"];

              if (strlen($c) >= 50){ $c = substr($row["problem"], 0, 50); $c .= '...';}
              if (strlen($ba) >= 10){ $ba = substr($row["companyName"], 0, 10); $ba .= '...';}

              if ($d == 1){
                  echo "<tr class='tropen'><td>{$a}</td><td>{$ba}</td><td>{$e}</td><!--td>{$f}</td--><td>{$c}</td><td><a href='./closeentry.php?id={$a}'>[Close]</a></td><td><a href='./editentry.php?id={$a}'>[Edit]</a></td></tr>";
                } elseif ($d == 2) {
                  echo "<tr class='trurgent'><td>{$a}</td><td>{$ba}</td><td>{$e}</td><!--td>{$f}</td--><td>{$c}</td><td><a href='./closeentry.php?id={$a}'>[Close]</a></td><td><a href='./editentry.php?id={$a}'>[Edit]</a></td></tr>";
                } elseif ($d == 0) {
                  echo "<tr class='trclosed'><td>{$a}</td><td>{$ba}</td><td>{$e}</td><!--td>{$f}</td--><td>{$c}</td><td><a href='./closeentry.php?id={$a}'>[Close]</a></td><td><a href='./editentry.php?id={$a}'>[Edit]</a></td></tr>";
                }
            }
            echo "</table>";
          }
        ?>
        <div class='manager-options'>
            <div class="colorexplanation" style="background: #333333;">&nbsp;</div> Open<span class="space">&nbsp;</span>
            <div class="colorexplanation" style="background: #FFF8A9;">&nbsp;</div> Urgent<span class="space">&nbsp;</span>
            <div class="colorexplanation" style="background: #A0FFB0;">&nbsp;</div> Closed<span class="space">&nbsp;</span>
        </div>
    </div>
    <?php include './bit/footer.php'; ?>
  </body>
</html>
