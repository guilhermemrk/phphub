<!DOCTYPE html>
<html>

<head>
    <?php
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
                <form action="./post/mp_addentry.php" method="POST">
                    <div class="line">
                        <div class="lineLabel">
                            <label for="name">Company</label>
                        </div>
                        <div class="lineInput">
                            <input class="textarea" type="text" id="companyid" name="companyid">
                        </div>
                    </div>
                    <div class="line">
                        <div class="lineLabel">
                            <label for="name">Urgent?</label>
                        </div>
                        <div class="lineInput">
                            <input class="textarea" type="text" id="status" name="status">
                        </div>
                    </div>
                    <div class="line">
                        <div class="lineLabel">
                            <label for="name">Problem</label>
                        </div>
                        <div class="lineInput">
                            <input class="textarea" type="text" id="problem" name="problem">
                        </div>
                    </div>
                    <div class="line">
                        <input class="button" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include './bit/footer.php'; ?>
</body>

</html>
