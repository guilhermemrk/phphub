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
            $sql = "SELECT * FROM manager as e JOIN city as c ON e.city = c.cityid WHERE companyid=$id";
            if ($results = $conn->query($sql)){
              while ($row = $results->fetch_assoc()){
                $a = $row["companyid"];
                $b = $row["companyName"];
                $d = $row["phone"];
                $e = $row["phoneSec"];
                $f = $row["emailPrimary"];
                $g = $row["emailAccountant"];
                $h = $row["addedBy"];

                // Not working if [city] is actually NULL or ''
                if ($row["city"] == NULL || $row["city"] == ''){
                  $c = "<span style='color: #696969;'>Não informado.</span>";
                } else {
                  $c = $row["cityName"];
                }

                if ($c == '' || $c == NULL) { $c = "<span style='color: #696969;'>Não informado.</span>"; }
                if ($d == '' || $d == NULL) { $d = "<span style='color: #696969;'>Não informado.</span>"; }
                if ($e == '' || $e == NULL) { $e = "<span style='color: #696969;'>Não informado.</span>"; }
                if ($f == '' || $f == NULL) { $f = "<span style='color: #696969;'>Não informado.</span>"; }
                if ($g == '' || $g == NULL) { $g = "<span style='color: #696969;'>Não informado.</span>"; }


                echo "<h1>${b}</h1>";

                echo "<table style='width:100%; text-align: left;'>
                  <tr class='trline' style='color: #F9F9F9 !important; '><th width='20%'>ID</th><td class='tdWithSpace'>${a}</td></tr>
                  <tr class='trline' style='color: #F9F9F9 !important;'><th width='20%'>Company Name</th><td class='tdWithSpace'>${b}</td></tr>
                  <tr class='trline' style='color: #F9F9F9 !important;'><th width='20%'>City</th><td class='tdWithSpace'>${c}</td></tr>
                  <tr class='trline' style='color: #F9F9F9 !important;'><th width='20%'>Phone</th><td class='tdWithSpace'>${d}</td></tr>
                  <tr class='trline' style='color: #F9F9F9 !important;'><th width='20%'>Phone 2</th><td class='tdWithSpace'>${e}</td></tr>
                  <tr class='trline' style='color: #F9F9F9 !important;'><th width='20%'>Email</th><td class='tdWithSpace'>${f}</td></tr>
                  <tr class='trline' style='color: #F9F9F9 !important;'><th width='20%'>Accountant Email</th><td class='tdWithSpace'>${g}</td></tr>
                  <tr class='trline' style='color: #F9F9F9 !important;'><th width='20%'>Added by</th><td class='tdWithSpace'>${h}</td></tr>
                </table>";
              }
            } else { echo "ERROR: Could not execute [$sql]. " . mysqli_error($conn); }
          ?>
        </div>
    </main>
    <?php include './bit/footer.php'; ?>
</body>

</html>
