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
        <div class="fcontainer-prompt">
          <div class="line">
            <div class="fprompt">
              Are you sure you want to close <b>all the entries</b>?
            </div>
          </div>
          <div class="prompt-btn">
            <a href="./src/post/mp_closeall.php"><input class="button" value="Yes"></a>
          </div>
        </div>
      </div>
    </main>
    <?php include './src/bit/footer.php'; ?>
  </body>
</html>
