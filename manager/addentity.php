<!DOCTYPE html>
<html>

<head>
    <?php
    include_once './src/bit/login_verification.php';
      $page_title = 'Add Entry';
      echo "<title>{$page_title}</title>";
      include './src/bit/core_htmlconfig.php';
      include './src/db/connect.php';
    ?>
</head>

<body>
    <main>
        <?php
          include './src/bit/core_header.php';
          include './src/bit/core_navbar.php';
        ?>
        <div class="container-a">
            <div class="formcontainer">
                <form action="./src/post/ep_addentity.php" method="POST">
                    <div class="line">
                        <div class="lineLabel">
                            <label for="name">Company</label>
                        </div>
                        <div class="lineInput">
                            <input class="textarea" type="text" id="companyn" name="companyn">
                        </div>
                    </div>
                    <div class="line">
                        <div class="lineLabel">
                            <label for="name">City</label>
                        </div>
                        <div class="lineInput">
                          <?php
                          $sql = "SELECT * FROM man_cep";

                          if ($results = $conn->query($sql)){
                            echo "<select class='textarea' id='city' name='city'>";
                            while ($row = $results->fetch_assoc()){
                              echo "<option value='" . $row['cityid'] . "'>". utf8_encode($row['cityName']) . "</option>";
                            }
                            echo "</select>";
                          }
                            ?>
                        </div>
                    </div>
                    <div class="line">
                        <div class="lineLabel">
                            <label for="name">Phone</label>
                        </div>
                        <div class="lineInput">
                            <input class="textarea" type="text" id="phone" name="phone">
                        </div>
                    </div>
                    <div class="line">
                        <div class="lineLabel">
                            <label for="name">Email</label>
                        </div>
                        <div class="lineInput">
                            <input class="textarea" type="text" id="email" name="email">
                        </div>
                    </div>
                    <div class="line">
                        <div class="lineLabel">
                            <label for="name">Accountant Email</label>
                        </div>
                        <div class="lineInput">
                            <input class="textarea" type="text" id="aemail" name="aemail">
                        </div>
                    </div>
                    <div class="line">
                        <input class="button" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include './src/bit/core_footer.php'; ?>
</body>

</html>
