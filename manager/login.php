<!DOCTYPE html>
<html>

<head>
    <?php $page_title = 'Login';
    echo "<title>{$page_title}</title>";
    include './src/bit/core/core_htmlconfig.php';
    ?>
</head>

<body>
  <?php
    include_once './src/bit/core/core_navbar.php';
    include_once './src/bit/core/core_header.php';

    $error = $_GET["loginerror"];
  ?>
  <div class='columns is-centered'>
    <div class='column is-4'>
    <section class="notifications_container">
        <?php include './src/bit/core/core_notifications.php'; ?>
    </section>
  </div>
  </div>
  <div class='columns is-centered'>
      <div class='column is-3'>
      <section class='container'>
        <section class='cSpaceAfterHeaderLogin'>
        <form action="./src/post/hp_login.php" method="POST">
          <div class="field">
            <label class="label">Usuário</label>
            <div class="control has-icons-left has-icons-right">
              <?php if (!is_NULL($error)){
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
            <?php if (!is_NULL($error)){
              echo "<p class='help is-danger'>Usuário Inválido.</p>";
            } ?>

          </div>

          <div class="field">
            <label class="label">Senha</label>
            <div class="control has-icons-left has-icons-right">
              <?php if (!is_NULL($error)){
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
            <?php if (!is_NULL($error)){
              echo "<p class='help is-danger'>Senha Inválida.</p>";
            }?>
          </div>

          <div class="field is-grouped">
            <div class="control">
              <button class="button is-dark" id="lsubmit">Entrar</button>
            </div>
          </div>
        </form>
      </section>
      </div>
  </div>
    <?php include_once './src/bit/core/core_footer.php'; ?>
</body>

</html>
