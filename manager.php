<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
      include './db/connect.php';
      include './bit/htmlconfig.php';

      $page_title = 'Manager';
      echo "<title>{$page_title}</title>";
    ?>
    <!-- <link rel="stylesheet" href="./css/bulma.css" /> -->
  </head>
  <body>
    <?php include './bit/header.php'; ?>
    <div class="container-nostyle">
        <?php
          $sql = "SELECT * FROM manager";

          if ($results = $conn->query($sql)){
            echo "<table style='width:100%; text-align: center;'><tr><th>ID</th><th>Company</th><th>Entry Date</th><th>Expire Date</th><th>Is Important?</th><th>Problem</th><th>Is Open?</th></tr>";

            while ($row = $results->fetch_assoc()){
              $a = $row["entryid"];
              $b = $row["companyid"];
              $c = $row["problem"];
              $d = $row["isImportant"];
              $e = $row["entryDate"];
              $f = $row["expireDate"];
              $g = $row["isOpen"];

              if ($d == 1){ $du = 'Yes'; } else { $du = "No"; }
              if ($g == 1){ $gu = 'Yes'; } else { $gu = "No"; }

              // Moment 

              if ($g == 1){
                echo "<tr><td>{$a}</td><td>{$b}</td><td>{$e}</td><td>{$f}</td><td>{$du}</td><td>{$c}</td><td>{$gu}</td></tr>";
                } else {
                return;
              }

            }
            echo "</table>";
          }
        ?>
    </div>
  </body>
</html>
