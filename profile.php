<!DOCTYPE html>
<html>

<head>
    <?php
      include './db/connect.php';
      $page_title = 'Profile';
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
            $sql = "SELECT * FROM entity as e JOIN cep as c ON e.city = c.cityid WHERE companyid=$id";
            if ($results = $conn->query($sql)){
              while ($row = $results->fetch_assoc()){
                $a = utf8_encode($row["companyid"]);
                $b = utf8_encode($row["companyName"]);
                $c = $row["city"];
                $d = $row["phone"];
                $e = $row["phoneSec"];
                $f = utf8_encode($row["emailPrimary"]);
                $g = utf8_encode($row["emailAccountant"]);
                $h = utf8_encode($row["addedBy"]);
                $ad = $row["dateAdded"];

                // Not working if [city] is actually NULL or '' || ?????????????
                if ($c == 0){ $c = "<span style='color: #696969;'>Não informado.</span>"; } else { $c = $row["cityName"]; }

                include_once './bit/format_pattern.php';

                echo "<h1>${b}</h1>";
                include './bit/entityoverview_options.php';
                
                echo "<table style='width:100%; text-align: left;'>
                        <tr class='trline-title'>
                            <th class='pthWithSpace'>ID</th>
                            <td class='tdWithSpace'>${a}</td>
                        </tr>
                        <tr class='trline-title'>
                            <th class='pthWithSpace'>Company Name</th>
                            <td class='tdWithSpace'>${b}</td>
                        </tr>
                        <tr class='trline-title'>
                            <th class='pthWithSpace'>City</th>
                            <td class='tdWithSpace'>${c}</td>
                        </tr>
                        <tr class='trline-title'>
                            <th class='pthWithSpace'>Phone</th>
                            <td class='tdWithSpace'>" . formatPhone($d) . "</td>
                        </tr>
                        <tr class='trline-title'>
                            <th class='pthWithSpace'>Phone 2</th>
                            <td class='tdWithSpace'>" . formatPhone($e) . "</td>
                        </tr>
                        <tr class='trline-title'>
                            <th class='pthWithSpace'>Email</th>
                            <td class='tdWithSpace'>" . formatEmail($f) . "</td>
                        </tr>
                        <tr class='trline-title'>
                            <th class='pthWithSpace'>Accountant Email</th>
                            <td class='tdWithSpace'>" . formatEmail($g) . "</td>
                        </tr>
                        <tr class='trline-title'>
                            <th class='pthWithSpace'>Added on</th>
                            <td class='tdWithSpace'>${ad}</td>
                        </tr>
                        <tr class='trline-title'>
                            <th class='pthWithSpace'>Added by</th>
                            <td class='tdWithSpace'><a href='./users.php?user=$h'>${h}</a></td>
                        </tr>
                      </table>
                      <table style='width:100%; text-align: left;'>
                        <tr class='trline-title'>
                            <th class='tdWithSpace'><a href='./manager.php?company=$a'>Show all entries.</a></th>
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
