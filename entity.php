<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
      // Make so the entry get status=2 if a day has passed
      include './db/connect.php';
      include './bit/htmlconfig.php';

      $page_title = 'Entity';
      echo "<title>{$page_title}</title>";
    ?>
  </head>
  <body>
    <?php
      include './bit/header.php';
      include './bit/navbar.php';
    ?>
    <meta charset="utf-8" />
    <div class="container-nostyle">
        <?php
          include './bit/entity_options.php';

          $sql = "SELECT * FROM entity ORDER BY isActive DESC, companyName ASC";

          if ($results = $conn->query($sql)){
            echo "<table style='width:100%; text-align: center;'><tr class='tropen' style='color: #F9F9F9 !important;'><th>ID</th><th>Company</th><th>Phone</th><th>Email</th><th>Active?</th><th>Edit</th></tr>";

            while ($row = $results->fetch_assoc()){
              $a = $row["companyid"];
              $b = $row["companyName"];
              $c = $row["phone"];
              $d = $row["emailPrimary"];
              $e = $row["isActive"];

              if ($e == 1){
                  echo "<tr class='tropen'><td>{$a}</td><td><a href='./profile.php?id=$a'>{$b}</a></td><td>{$c}</td><td>{$d}</td><td>{$e}</td><td><a href='#'>[Edit]</a></td></tr>";
                } elseif ($e == 0) {
                  echo "<tr class='tropen'><td>{$a}</td><td><a href='./profile.php?id=$a'>{$b}</a></td><td>{$c}</td><td>{$d}</td><td>{$e}</td><td><a href='#'>[Edit]</a></td></tr>";
                }
            }
            echo "</table>";
          }
        ?>
        <!-- <div class='manager-options'>
            <div class="colorexplanation" style="background: #333333;">&nbsp;</div> Open<span class="space">&nbsp;</span>
            <div class="colorexplanation" style="background: #FFF8A9;">&nbsp;</div> Urgent<span class="space">&nbsp;</span>
            <div class="colorexplanation" style="background: #A0FFB0;">&nbsp;</div> Closed<span class="space">&nbsp;</span>
        </div> -->
    </div>
    <?php include './bit/footer.php'; ?>
  </body>
</html>
