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
            echo "<table style='width:100%; text-align: center;'>
                    <tr class='trline-title'>
                        <th>&nbsp;</th>
                        <th>ID</th>
                        <th>Company</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Accountant Email</th>
                        <th>Edit</th>
                    </tr>";

            while ($row = $results->fetch_assoc()){
              $a = utf8_encode($row["companyid"]);
              $b = utf8_encode($row["companyName"]);
              $c = utf8_encode($row["phone"]);
              $d = utf8_encode($row["emailPrimary"]);
              $ds = utf8_encode($row["emailAccountant"]);
              $e = utf8_encode($row["isActive"]);

              include_once './bit/format_pattern.php';

              if ($e == 1){
                  echo "<tr class='trline'>
                          <td class='tropen'>&nbsp;</td>
                          <td class='mopt-box'>{$a}</td>
                          <td class='entity-name'><a href='./profile.php?id=$a'>{$b}</a></td>
                          <td class='entity-phone'>" . formatPhone($c) . "</td>
                          <td class='entity-email'>" . formatEmail($d) . "</td>
                          <td class='entity-email'>" . formatEmail($ds) . "</td>
                          <td class='mopt-box'>
                              <a href='profile_edit.php?id=$a'><img src='./src/images/edit.png' /></a>
                          </td>
                      </tr>";
                } elseif ($e == 0) {
                  echo "<tr class='trline'>
                          <td class='trclosed'>&nbsp;</td>
                          <td class='mopt-box'>{$a}</td>
                          <td class='entity-name'><a href='./profile.php?id=$a'>{$b}</a></td>
                          <td class='entity-phone'>" . formatPhone($c) . "</td>
                          <td class='entity-email'>{$d}</td>
                          <td class='entity-email'>{$ds}</td>
                          <td class='mopt-box'>
                              <a href='./profile_edit.php?id=$a'><img src='./src/images/edit.png' /></a>
                          </td>
                      </tr>";
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
