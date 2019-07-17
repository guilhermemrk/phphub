<!DOCTYPE html>
<html>

<head>
    <?php
    include_once './src/bit/login_verification.php';
      include './src/db/connect.php';
      $page_title = 'Add Entry';
      echo "<title>{$page_title}</title>";
      include './src/bit/htmlconfig.php';
    ?>
</head>
<body>
    <main>
        <?php
          include './src/bit/header.php';
          include './src/bit/navbar.php';
        ?>
        <div class="container-a">
            <div class="formcontainer">
              <?php
              $entryid = htmlspecialchars($_GET["id"]);

              $sql = "SELECT * FROM manager AS m JOIN entity as e ON m.companyid=e.companyid WHERE entryid=$entryid";

              if ($results = $conn->query($sql)){
                while ($row = $results->fetch_assoc()){
                  $a = $row["entryid"];
                  $b = $row["companyid"];
                  $ba = $row["companyName"];
                  $c = $row["problem"];
                  $d = $row["status"];
                  $e = $row["entryDate"];

                  echo "<form action='./src/post/mp_editentry.php?id=$a' method='POST'>
                      <div class='line'>
                          <div class='lineLabel'>
                              <label for='name'>Entry ID</label>
                          </div>
                          <div class='lineInput'>
                              <input class='textarea' value='$a' type='text' id='entryid' name='entryid' disabled>
                          </div>
                      </div>
                      <div class='line'>
                          <div class='lineLabel'>
                              <label for='name'>Company</label>
                          </div>
                          <div class='lineInput'>
                              <input class='textarea' value='$ba' type='text' disabled>
                          </div>
                      </div>
                      <div class='line'>
                          <div class='lineLabel'>
                              <label for='name'>Entry Date</label>
                          </div>
                          <div class='lineInput'>
                              <input class='textarea' value='$e' type='text' disabled>
                          </div>
                      </div>
                      <div class='line'>
                          <div class='lineLabel'>
                              <label for='name'>Problem</label>
                          </div>
                          <div class='lineInput'>
                              <input class='textarea' value='$c' type='text' id='problem' name='problem'>
                          </div>
                      </div>
                      <div class='line'>
                          <div class='lineLabel'>
                              <label for='name'>Status</label>
                          </div>
                          <div class='lineInput'>
                            <select class='textarea' id='status' name='status'>
                              <option value='1'>Aberta</option>
                              <option value='2'>Urgente</option>
                              <option value='0'>Fechada</option>
                            </select>
                          </div>
                      </div>
                      <div class='line'>
                          <input class='button' type='submit' value='Submit'>
                      </div>
                  </form>";
                }
              }
              ?>
            </div>
        </div>
    </main>
    <?php include './src/bit/footer.php'; ?>
</body>

</html>
