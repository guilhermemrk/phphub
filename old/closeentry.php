<!DOCTYPE html>
<html>
<head>
    <?php
    include_once './src/bit/login_verification.php';
      include './src/db/connect.php';
      $page_title = 'Add Entry';
      echo "<title>{$page_title}</title>";
      include './src/bit/htmlconfig.php';

      $id = $_GET["id"];
    ?>
</head>
<body>
    <main>
      <?php
        include './src/bit/header.php';
        include './src/bit/navbar.php';
      ?>
      <div class="container-a">
        <div class="fcontainer-prompt">
          <div class="line">
            <div class="fprompt">
              <?php echo "Are you sure you want to close the entry number <b>$id</b>?"; ?>
            </div>
          </div>
          <div class="prompt-btn">
            <?php echo "<a href='./post/mp_closeentry.php?id=$id'><input class='button' value='Yes'></a>"; ?>
          </div>
        </div>
      </div>
    </main>
    <?php include './src/bit/footer.php'; ?>
</body>
</html>
