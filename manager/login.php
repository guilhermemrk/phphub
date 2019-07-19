<!DOCTYPE html>
<html>

<head>
    <?php $page_title = 'Login';
    echo "<title>{$page_title}</title>";
    include './src/bit/core_htmlconfig.php';
    ?>
</head>

<body>
  <?php
    include_once './src/bit/core_navbar.php';
    include_once './src/bit/core_header.php';

    $failed = $_GET["failed"];
  ?>
  <div class='columns is-centered'>
      <div class='column is-3'>
      <section class='container'>
        <section class='cSpaceAfterHeaderLogin'>
        <form action="./src/post/hp_login.php" method="POST">
          <div class="field">
            <label class="label">Username</label>
            <div class="control has-icons-left has-icons-right">
              <?php if (!is_NULL($failed)){
                echo "<input class='input is-danger' type='text' placeholder='Text input' name='lusername'>";
              } else {
                echo "<input class='input' type='text' placeholder='Text input' name='lusername'>";
              } ?>
              <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
              </span>
              <span class="icon is-small is-right">
                <i class="fas fa-check"></i>
              </span>
            </div>
            <?php if (!is_NULL($failed)){
              echo "<p class='help is-danger'>This username is invalid.</p>";
            } ?>

          </div>

          <div class="field">
            <label class="label">Password</label>
            <div class="control has-icons-left has-icons-right">
              <?php if (!is_NULL($failed)){
                echo "<input class='input is-danger' type='password' placeholder='Password input' name='lpass'>";
              } else {
                echo "<input class='input' type='password' placeholder='Password input' name='lpass'>";
              } ?>
              <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
              </span>
              <span class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
              </span>
            </div>
            <?php if (!is_NULL($failed)){
              echo "<p class='help is-danger'>This username is invalid.</p>";
            }?>
          </div>

          <div class="field is-grouped">
            <div class="control">
              <button class="button is-dark" id="lsubmit">Submit</button>
            </div>
          </div>
        </form>
      </section>
      </div>
  </div>
    <?php include_once './src/bit/core_footer.php'; ?>
</body>

</html>
