<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
      // Make so the entry get status=2 if a day has passed
      include_once './src/bit/login_verification.php';
      include './src/db/connect.php';
      include './src/bit/htmlconfig.php';

      $page_title = 'Manager';
      echo "<title>{$page_title}</title>";

      $filter = $_GET['filter']; // 0 - closed, 1 - open, 2 - urgent, null = all

    ?>
  </head>
  <body>
    <?php
      include './src/bit/header.php';
      include './src/bit/navbar.php';
    ?>
    <div class="container-model1">
        <?php
          include './src/bit/nfe_options.php';

          $sql = "SELECT * FROM manager AS m JOIN entity AS e ON m.companyid = e.companyid WHERE status IN (20,21,22) ORDER BY status DESC, entryDate ASC LIMIT 50";

          if ($results = $conn->query($sql)){
            echo "<table style='width:100%; text-align: center;'>
                    <tr class='trline-title'>
                        <th>&nbsp;</th>
                        <th>Company</th>
                        <th>Entry Date</th>
                        <th>Model</th>
                        <th>ID</th>
                        <th>NV</th>
                        <th>NF</th>
                        <th>Procedure</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>";

            while ($row = $results->fetch_assoc()){
              $a = utf8_encode($row["entryid"]);
              $b = utf8_encode($row["companyid"]);
              $ba = utf8_encode($row["companyName"]);
              $c = utf8_encode($row["nfe_modelo"]);
              $d = utf8_encode($row["nfe_id"]);
              $e = utf8_encode($row["nfe_nv"]);
              $f = utf8_encode($row["nfe_nf"]);
              $g = utf8_encode($row["entryDate"]);
              $h = utf8_encode($row["problem"]);
              $i = utf8_encode($row["status"]);

              // $c = utf8_encode($row["problem"]);
              // $d = utf8_encode($row["status"]);
              // $e = utf8_encode($row["entryDate"]);

              if ($c == '55'){ $ca = 'NFe'; } elseif ($c == '65'){ $ca = 'NFCe'; }
              if (strlen($h) >= 15){ $h = substr($row["problem"], 0, 15); $h .= '...';}
              if (strlen($ba) >= 20){ $ba = substr($row["companyName"], 0, 20); $ba .= '...';}

              if (is_NULL($filter)){
                if ($i == 21){
                    echo "<tr class='trline'>
                            <td class='tropen'>&nbsp;</td>
                            <td class='company-name'><a href='./profile.php?id=$b'>$ba</a></td>
                            <td class='m-entrydate'>$g</td>
                            <td class='nfe-cod'>$ca</td>
                            <td class='nfe-cod'>$d</th>
                            <td class='nfe-cod'>$e</th>
                            <td class='nfe-cod'>$f</th>
                            <td><a href='./problem.php?id=$a'>{$h}</a></td>
                            <td class='mopt-box'>
                                <a href='./closenfe.php?id={$a}'><img src='./src/images/delete.png' /></a>
                            </td>
                            <td class='mopt-box'>
                                <a href='./editnfe.php?id={$a}'><img src='./src/images/edit.png' /></a>
                            </td>
                        </tr>";
                  } elseif ($i == 22) {
                    echo "<tr class='trline'>
                            <td class='trurgent'>&nbsp;</td>
                            <td class='company-name'><a href='./profile.php?id=$b'>$ba</a></td>
                            <td class='m-entrydate'>$g</td>
                            <td class='nfe-cod'>$ca</td>
                            <td class='nfe-cod'>$d</th>
                            <td class='nfe-cod'>$e</th>
                            <td class='nfe-cod'>$f</th>
                            <td><a href='./problem.php?id=$a'>{$h}</a></td>
                            <td class='mopt-box'>
                                <a href='./closenfe.php?id={$a}'><img src='./src/images/delete.png' /></a>
                            </td>
                            <td class='mopt-box'>
                                <a href='./editnfe.php?id={$a}'><img src='./src/images/edit.png' /></a>
                            </td>
                        </tr>";
                  } elseif ($i == 20) {
                    echo "<tr class='trline'>
                            <td class='trclosed'>&nbsp;</td>
                            <td class='company-name'><a href='./profile.php?id=$b'>$ba</a></td>
                            <td class='m-entrydate'>$g</td>
                            <td class='nfe-cod'>$ca</td>
                            <td class='nfe-cod'>$d</th>
                            <td class='nfe-cod'>$e</th>
                            <td class='nfe-cod'>$f</th>
                            <td><a href='./problem.php?id=$a'>{$h}</a></td>
                            <td class='mopt-box'>
                                <a href='./closenfe.php?id={$a}'><img src='./src/images/delete.png' /></a>
                            </td>
                            <td class='mopt-box'>
                                <a href='./editnfe.php?id={$a}'><img src='./src/images/edit.png' /></a>
                            </td>
                        </tr>";
                  } } elseif (is_numeric($filter) & $filter == 0){ // 0 - closed
                if ($i == 20){
                  echo "<tr class='trline'>
                          <td class='trclosed'>&nbsp;</td>
                          <td class='company-name'><a href='./profile.php?id=$b'>$ba</a></td>
                          <td class='m-entrydate'>$g</td>
                          <td class='nfe-cod'>$ca</td>
                          <td class='nfe-cod'>$d</th>
                          <td class='nfe-cod'>$e</th>
                          <td class='nfe-cod'>$f</th>
                          <td><a href='./problem.php?id=$a'>{$h}</a></td>
                          <td class='mopt-box'>
                              <a href='./closenfe.php?id={$a}'><img src='./src/images/delete.png' /></a>
                          </td>
                          <td class='mopt-box'>
                              <a href='./editnfe.php?id={$a}'><img src='./src/images/edit.png' /></a>
                          </td>
                      </tr>";
                } } elseif ($filter == 1){ // 1 - open
                if ($i == 21){
                  echo "<tr class='trline'>
                          <td class='tropen'>&nbsp;</td>
                          <td class='company-name'><a href='./profile.php?id=$b'>$ba</a></td>
                          <td class='m-entrydate'>$g</td>
                          <td class='nfe-cod'>$ca</td>
                          <td class='nfe-cod'>$d</th>
                          <td class='nfe-cod'>$e</th>
                          <td class='nfe-cod'>$f</th>
                          <td><a href='./problem.php?id=$a'>{$h}</a></td>
                          <td class='mopt-box'>
                              <a href='./closenfe.php?id={$a}'><img src='./src/images/delete.png' /></a>
                          </td>
                          <td class='mopt-box'>
                              <a href='./editnfe.php?id={$a}'><img src='./src/images/edit.png' /></a>
                          </td>
                      </tr>";
                } } elseif ($filter == 2){ // 2 - urgent
                if ($i == 22){
                  echo "<tr class='trline'>
                          <td class='trurgent'>&nbsp;</td>
                          <td class='company-name'><a href='./profile.php?id=$b'>$ba</a></td>
                          <td class='m-entrydate'>$g</td>
                          <td class='nfe-cod'>$ca</td>
                          <td class='nfe-cod'>$d</th>
                          <td class='nfe-cod'>$e</th>
                          <td class='nfe-cod'>$f</th>
                          <td><a href='./problem.php?id=$a'>{$h}</a></td>
                          <td class='mopt-box'>
                              <a href='./closenfe.php?id={$a}'><img src='./src/images/delete.png' /></a>
                          </td>
                          <td class='mopt-box'>
                              <a href='./editnfe.php?id={$a}'><img src='./src/images/edit.png' /></a>
                          </td>
                      </tr>";
                } } }
            echo "</table>";
          }

          include './src/bit/manager_exp.php';

        ?>
    </div>
    <?php include './src/bit/footer.php'; ?>
  </body>
</html>
