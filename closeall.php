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
                    <div class="line">
                        <div class="lineLabel">
                            <label for="name">Are you sure you want to close all the entries?</label>
                        </div>
                    </div>
                    <div class="line">
                        <a href="./post/mp_closeall.php"><input class="button" value="Yes"></a>
                    </div>
            </div>
        </div>
    </main>
    <?php include './bit/footer.php'; ?>
</body>

</html>
