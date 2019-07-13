<!DOCTYPE html>
<html>
<head>
    <?php
      include './db/connect.php';
      $page_title = 'Add Entry';
      echo "<title>{$page_title}</title>";
      include './bit/htmlconfig.php';

      $id = $_GET["id"];
    ?>
</head>
<body>
    <main>
      <?php
        include './bit/header.php';
        include './bit/navbar.php';
      ?>
      <div class="container">
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
    <?php include './bit/footer.php'; ?>
</body>
</html>
