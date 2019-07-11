<!DOCTYPE html>
<html>

<head>
    <?php
      include './db/connect.php';
      $page_title = 'Add Entry';
      echo "<title>{$page_title}</title>";
      include './bit/htmlconfig.php';
    ?>
</head>
<body>
    <main>
        <?php
          include './bit/header.php';
          include './bit/navbar.php';
        ?>
        <div class="container">
            <div class="formcontainer">
              <?php
              $entryid = htmlspecialchars($_GET["id"]);

              $sql = "SELECT * FROM manager WHERE entryid=$entryid";

              if ($results = $conn->query($sql)){
                while ($row = $results->fetch_assoc()){
                  $a = $row["entryid"];
                  $b = $row["companyid"];
                  $c = $row["problem"];
                  $d = $row["status"];
                  $e = $row["entryDate"];

                  echo "<form action='./post/mp_editentry.php?id=$a' method='POST'>
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
                              <input class='textarea' value='$b' type='text' disabled>
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
                              <input class='textarea' value='$d' type='text' id='status' name='status'>
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
                          <input class='button' type='submit' value='Submit'>
                      </div>
                  </form>";
                }
              }
              ?>
            </div>
        </div>
    </main>
    <?php include './bit/footer.php'; ?>
</body>

</html>
