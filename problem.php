<!DOCTYPE html>
<html>

<head>
    <?php
      include './db/connect.php';
      $page_title = 'Entry Overview';
      echo "<title>{$page_title}</title>";
      include './bit/htmlconfig.php';

      $id = $_GET['id'];
    ?>
</head>

<body>
    <main>
        <?php
          include './bit/header.php';
          include './bit/navbar.php';
        ?>
        <div class="container-nostyle">
          <?php
            $sql = "SELECT * FROM manager AS m JOIN entity AS e ON m.companyid = e.companyid WHERE entryid=$id";
            if ($results = $conn->query($sql)){
              while ($row = $results->fetch_assoc()){
                $a = utf8_encode($row["entryid"]);
                $b = utf8_encode($row["companyid"]);
                $ba = utf8_encode($row["companyName"]);
                $c = utf8_encode($row["problem"]);
                $d = utf8_encode($row["status"]);
                $e = utf8_encode($row["entryDate"]);

                if ($d == 0){ $d = "Closed"; } elseif ($d == 1){ $d = "Open"; } elseif ($d == 2){ $d = "Urgent"; }

                  echo "<h1>Entry #$a</h1>";
                  include './bit/entry_options.php';

                  echo "<table style='width:100%; text-align: left;'>
                          <tr class='trline-title'>
                              <th class='pthWithSpace'>ID</th>
                              <td class='tdWithSpace'>${a}</td>
                          </tr>
                          <tr class='trline-title'>
                              <th class='pthWithSpace'>Company Name</th>
                              <td class='tdWithSpace'><a href='./profile.php?id=$b'>$b - ${ba}</a></td>
                          </tr>
                          <tr class='trline-title'>
                              <th class='pthWithSpace'>Status</th>
                              <td class='tdWithSpace'>$d</td>
                          </tr>
                          <tr class='trline-title'>
                              <th class='pthWithSpace'>Entry Date</th>
                              <td class='tdWithSpace'>$e</td>
                          </tr>
                        </table>
                        <table style='width:100%; text-align: left;'>
                          <tr class='trline-title'>
                              <th class='pthWithSpace'>Problem</th>
                          </tr>
                        </table>
                        <table class='tProblem'>
                          <tr class='trline'>
                              <td class='tdProblem'>$c</td>
                          </tr>
                        </table>";
                }
            } else { echo "ERROR: Could not execute [$sql]. " . mysqli_error($conn); }
          ?>
        </div>
    </main>
    <?php include './bit/footer.php'; ?>
</body>

</html>
