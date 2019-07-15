<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
      // Make so the entry get status=2 if a day has passed
      include './src/db/connect.php';
      include_once './src/bit/htmlconfig.php';

      $filter = $_GET['filter']; // 0 - closed, 1 - open, 2 - urgent, null = all

      $section_title = 'Manager';
      if (is_NULL($filter)){ $page_title = 'All entries'; }
      elseif ($filter == 0) { $page_title = 'Closed entries'; }
      elseif ($filter == 1) { $page_title = 'Open entries'; }
      elseif ($filter == 2) { $page_title = 'Urgent entries'; }
      echo "<title>{$section_title} - {$page_title}</title>";



    ?>
  </head>
  <body>
    <?php
      include_once './src/bit/navbar.php';
      include_once './src/bit/header.php';
    ?>
    <div class='columns is-centered'>
        <div class='column is-full'>
        <section class='container'>
          <section class='cSpaceAfterHeaderTable'>
              <?php
                include_once './src/bit/manager_options.php';

                  $sql = "SELECT * FROM manager AS m JOIN entity AS e ON m.companyid = e.companyid WHERE status IN (0,1,2) ORDER BY status DESC, entryDate ASC LIMIT 50";

                  if ($results = $conn->query($sql)){
                    echo "<table class='table is-bordered is-fullwidth'>
                      <thead>
                        <tr>
                          <th class='mopt-status'></th>
                          <th class='company-name'>Company Name</th>
                          <th class='m-entrydate'>Entry Date</th>
                          <th>Problem</th>
                          <th class='mopt-box'></th>
                          <th class='mopt-box'></th>
                        </tr>
                      </thead>
                      <tbody>";

                    while ($row = $results->fetch_assoc()){
                      $a = $row["entryid"];
                      $b = $row["companyid"];
                      $ba = utf8_encode($row["companyName"]);
                      $c = utf8_encode($row["problem"]);
                      $d = $row["status"];
                      $e = $row["entryDate"];

                      if (strlen($ba) >= 20){ $ba = substr($row["companyName"], 0, 20); $ba .= '...';}
                      if (strlen($c) >= 100){ $c = substr($row["problem"], 0, 100); $c .= '...';}
                      if (strlen($e) >= 11){ $e = substr($row["entryDate"], 0, 10); }

                      if (is_NULL($filter)){
                        if ($d == 1){
                            echo "<tr>
                                    <td class='tropen'>&nbsp;</td>
                                    <td><a href='./profile.php?id=$b'>" . ucfirst($ba) . "</a></td>
                                    <td>" . ucfirst($e) . "</td>
                                    <td><a href='./problem.php?id=$a'>" . ucfirst($c) . "</a></td>
                                    <td><a href='./closeentry.php?id={$a}'><img src='./src/images/delete.png' /></a></td>
                                    <td><a href='./editentry.php?id={$a}'><img src='./src/images/edit.png' /></a></td>
                                  </tr>";
                          } elseif ($d == 2) {
                            echo "<tr>
                                    <td class='trurgent'>&nbsp;</td>
                                    <td><a href='./profile.php?id=$b'>" . ucfirst($ba) . "</a></td>
                                    <td>" . ucfirst($e) . "</td>
                                    <td><a href='./problem.php?id=$a'>" . ucfirst($c) . "</a></td>
                                    <td><a href='./closeentry.php?id={$a}'><img src='./src/images/delete.png' /></a></td>
                                    <td><a href='./editentry.php?id={$a}'><img src='./src/images/edit.png' /></a></td>
                                  </tr>";
                          } elseif ($d == 0) {
                            echo "<tr>
                                    <td class='trclosed'>&nbsp;</td>
                                    <td><a href='./profile.php?id=$b'>" . ucfirst($ba) . "</a></td>
                                    <td>" . ucfirst($e) . "</td>
                                    <td><a href='./problem.php?id=$a'>" . ucfirst($c) . "</a></td>
                                    <td><a href='./closeentry.php?id={$a}'><img src='./src/images/delete.png' /></a></td>
                                    <td><a href='./editentry.php?id={$a}'><img src='./src/images/edit.png' /></a></td>
                                  </tr>";
                          } } elseif (is_numeric($filter) & $filter == 0){ // 0 - closed
                        if ($d == 0){
                          echo "<tr>
                                  <td class='trclosed'>&nbsp;</td>
                                  <td><a href='./profile.php?id=$b'>" . ucfirst($ba) . "</a></td>
                                  <td>" . ucfirst($e) . "</td>
                                  <td><a href='./problem.php?id=$a'>" . ucfirst($c) . "</a></td>
                                  <td><a href='./closeentry.php?id={$a}'><img src='./src/images/delete.png' /></a></td>
                                  <td><a href='./editentry.php?id={$a}'><img src='./src/images/edit.png' /></a></td>
                                </tr>";
                        } } elseif ($filter == 1){ // 1 - open
                        if ($d == 1){
                          echo "<tr>
                                  <td class='tropen'>&nbsp;</td>
                                  <td><a href='./profile.php?id=$b'>" . ucfirst($ba) . "</a></td>
                                  <td>" . ucfirst($e) . "</td>
                                  <td><a href='./problem.php?id=$a'>" . ucfirst($c) . "</a></td>
                                  <td><a href='./closeentry.php?id={$a}'><img src='./src/images/delete.png' /></a></td>
                                  <td><a href='./editentry.php?id={$a}'><img src='./src/images/edit.png' /></a></td>
                                </tr>";
                        } } elseif ($filter == 2){ // 2 - urgent
                        if ($d == 2){
                          echo "<tr>
                                  <td class='trurgent'>&nbsp;</td>
                                  <td><a href='./profile.php?id=$b'>" . ucfirst($ba) . "</a></td>
                                  <td>" . ucfirst($e) . "</td>
                                  <td><a href='./problem.php?id=$a'>" . ucfirst($c) . "</a></td>
                                  <td><a href='./closeentry.php?id={$a}'><img src='./src/images/delete.png' /></a></td>
                                  <td><a href='./editentry.php?id={$a}'><img src='./src/images/edit.png' /></a></td>
                                </tr>";
                        } } }
                    echo "</tbody></table>";
                  }
              ?>
          </section>
          <section class='cSpaceSmall'>
            <section>
              <div class='manager-explanation'>
                <?php include_once './src/bit/manager_exp.php'; ?>
              </div>
            </section>
          </section>
        </section>
        </div>
    </div>
      <?php include_once './src/bit/footer.php'; ?>
  </body>
</html>
