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
      include './src/bit/navbar.php';
      include './src/bit/header.php';
    ?>
    <div class="container-model1">
        <?php
          include '/src./bit/manager_options.php';

          $sql = "SELECT * FROM manager AS m JOIN entity AS e ON m.companyid = e.companyid WHERE status IN (0,1,2) ORDER BY status DESC, entryDate ASC LIMIT 50";

          if ($results = $conn->query($sql)){
            echo "<table style='width:100%; text-align: center;'>
                    <tr class='trline-title'>
                        <th>&nbsp;</th>
                        <th>Company</th>
                        <th>Entry Date</th>
                        <th>Problem</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>";

            while ($row = $results->fetch_assoc()){
              $a = utf8_encode($row["entryid"]);
              $b = utf8_encode($row["companyid"]);
              $ba = utf8_encode($row["companyName"]);
              $c = utf8_encode($row["problem"]);
              $d = utf8_encode($row["status"]);
              $e = utf8_encode($row["entryDate"]);

              if (strlen($c) >= 80){ $c = substr($row["problem"], 0, 80); $c .= '...';}
              if (strlen($ba) >= 20){ $ba = substr($row["companyName"], 0, 20); $ba .= '...';}

              if (is_NULL($filter)){
                if ($d == 1){
                    echo "<tr class='trline'>
                            <td class='tropen'>&nbsp;</td>
                            <td class='company-name'><a href='./profile.php?id=$b'>{$ba}</a></td>
                            <td class='m-entrydate'>{$e}</td>
                            <td><a href='./problem.php?id=$a'>{$c}</a></td>
                            <td class='mopt-box'>
                                <a href='./closeentry.php?id={$a}'><img src='./src/images/delete.png' /></a>
                            </td>
                            <td class='mopt-box'>
                                <a href='./editentry.php?id={$a}'><img src='./src/images/edit.png' /></a>
                            </td>
                        </tr>";
                  } elseif ($d == 2) {
                    echo "<tr class='trline'>
                            <td class='trurgent'>&nbsp;</td>
                            <td class='company-name'><a href='./profile.php?id=$b'>{$ba}</a></td>
                            <td class='m-entrydate'>{$e}</td>
                            <td><a href='./problem.php?id=$a''>{$c}</a></td>
                            <td class='mopt-box'>
                                <a href='./closeentry.php?id={$a}'><img src='./src/images/delete.png' /></a>
                            </td>
                            <td class='mopt-box'>
                                <a href='./editentry.php?id={$a}'><img src='./src/images/edit.png' /></a>
                            </td>
                        </tr>";
                  } elseif ($d == 0) {
                    echo "<tr class='trline'>
                            <td class='trclosed'>&nbsp;</td>
                            <td class='company-name'><a href='./profile.php?id=$b'>{$ba}</a></td>
                            <td class='m-entrydate'>{$e}</td>
                            <td><a href='./problem.php?id=$a''>{$c}</a></td>
                            <td class='mopt-box'>
                                <a href='./closeentry.php?id={$a}'><img src='./src/images/delete.png' /></a>
                            </td>
                            <td class='mopt-box'>
                                <a href='./editentry.php?id={$a}'><img src='./src/images/edit.png' /></a>
                            </td>
                        </tr>";
                  } } elseif (is_numeric($filter) & $filter == 0){ // 0 - closed
                if ($d == 0){
                  echo "<tr class='trline'>
                          <td class='trclosed'>&nbsp;</td>
                          <td class='company-name'><a href='./profile.php?id=$b'>{$ba}</a></td>
                          <td class='m-entrydate'>{$e}</td>
                          <td><a href='./problem.php?id=$a''>{$c}</a></td>
                          <td class='mopt-box'>
                              <a href='./closeentry.php?id={$a}'><img src='./src/images/delete.png' /></a>
                          </td>
                          <td class='mopt-box'>
                              <a href='./editentry.php?id={$a}'><img src='./src/images/edit.png' /></a>
                          </td>
                      </tr>";
                } } elseif ($filter == 1){ // 1 - open
                if ($d == 1){
                  echo "<tr class='trline'>
                          <td class='tropen'>&nbsp;</td>
                          <td class='company-name'><a href='./profile.php?id=$b'>{$ba}</a></td>
                          <td class='m-entrydate'>{$e}</td>
                          <td><a href='./problem.php?id=$a''>{$c}</a></td>
                          <td class='mopt-box'>
                              <a href='./closeentry.php?id={$a}'><img src='./src/images/delete.png' /></a>
                          </td>
                          <td class='mopt-box'>
                              <a href='./editentry.php?id={$a}'><img src='./src/images/edit.png' /></a>
                          </td>
                      </tr>";
                } } elseif ($filter == 2){ // 2 - urgent
                if ($d == 2){
                  echo "<tr class='trline'>
                          <td class='trurgent'>&nbsp;</td>
                          <td class='company-name'><a href='./profile.php?id=$b'>{$ba}</a></td>
                          <td class='m-entrydate'>{$e}</td>
                          <td><a href='./problem.php?id=$a''>{$c}</a></td>
                          <td class='mopt-box'>
                              <a href='./closeentry.php?id={$a}'><img src='./src/images/delete.png' /></a>
                          </td>
                          <td class='mopt-box'>
                              <a href='./editentry.php?id={$a}'><img src='./src/images/edit.png' /></a>
                          </td>
                      </tr>";
                } } }
            echo "</table>";
          }

          include './src/bit/manager_exp.php';

        ?>
    </div>
  </body>
</html>
