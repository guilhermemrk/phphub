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
    <div class="container-model1">
        <?php
          include './bit/entity_options.php';

          $sql = "SELECT * FROM entity ORDER BY isActive DESC, companyName ASC LIMIT 50";

          if ($results = $conn->query($sql)){
            echo "<table style='width:100%; text-align: center;'><tr class='trline' style='color: #F9F9F9 !important;'><th>&nbsp;</th><th>ID</th><th>Company</th><th>Phone</th><th>Email</th><th>Accountant Email</th><th>Edit</th></tr>";

            while ($row = $results->fetch_assoc()){
              $a = utf8_encode($row["companyid"]);
              $b = utf8_encode($row["companyName"]);
              $d = utf8_encode($row["emailPrimary"]);
              $ds = utf8_encode($row["emailAccountant"]);
              $e = utf8_encode($row["isActive"]);

              // SLICING IS NOT WORKING D:

              if (is_NULL($row["phone"]) || $row["phone"] == ''){ $c = "<span style='color: #696969;'>Não informado.</span>"; } else {
                if (strlen($row["phone"]) == 10){
                  $c1 = substr($row["phone"], 0, 2);
                  $c2 = substr($row["phone"], 3, 4);
                  $c3 = substr($row["phone"], 5, 9);
                  $c = utf8_encode("({$c1}) $c2-$c3");
                } elseif (strlen($row["phone"]) == 11){
                  $c1 = substr($row["phone"], 0, 2);
                  $c2 = substr($row["phone"], 3, 6);
                  $c3 = substr($row["phone"], 7, 11);
                  $c = utf8_encode("({$c1}) $c2-$c3");
                } elseif (strlen($row["phone"]) == 13){
                  $c0 = substr($row["phone"], 0, 3);
                  $c1 = substr($row["phone"], 3, 4);
                  $c2 = substr($row["phone"], 4, 8);
                  $c3 = substr($row["phone"], 8, 13);
                  $c = utf8_encode("$c0 ({$c1}) $c2-$c3");
                } elseif (strlen($row["phone"]) == 14){
                  $c0 = substr($row["phone"], 0, 3);
                  $c1 = substr($row["phone"], 3, 5);
                  $c2 = substr($row["phone"], 5, 9);
                  $c3 = substr($row["phone"], 9, 14);
                  $c = utf8_encode("$c0 ({$c1}) $c2-$c3");
                }
              }

              if (is_NULL($d) || $d == ''){ $d = "<span style='color: #696969;'>Não informado.</span>"; }
              if (is_NULL($ds) || $ds == ''){ $ds = "<span style='color: #696969;'>Não informado.</span>"; }


              if ($e == 1){
                  echo "<tr class='trline'><td class='tropen'>&nbsp;</td><td class='mopt-box'>{$a}</td><td class='entity-name'><a href='./profile.php?id=$a'>{$b}</a></td><td class='entity-phone'>$c</td><td class='entity-email'>{$d}</td><td class='entity-email'>{$ds}</td><td class='mopt-box'><a href='profile_edit.php?id=$a'><img src='./src/images/edit.png' /></a></td></tr>";
                } elseif ($e == 0) {
                  echo "<tr class='trline'><td class='trclosed'>&nbsp;</td><td class='mopt-box' >{$a}</td><td class='entity-name'><a href='./profile.php?id=$a'>{$b}</a></td><td class='entity-phone'>$c</td><td class='entity-email'>{$d}</td><td class='entity-email'>{$ds}</td><td class='mopt-box'><a href='profile_edit.php?id=$a'><img src='./src/images/edit.png' /></a></td></tr>";
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
