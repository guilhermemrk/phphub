<!DOCTYPE html>
<html>

<head>
    <?php
    include_once './src/bit/login_verification.php';
      $section_title = 'Manager';
      $page_title = 'Add Entry';
      echo "<title>$section_title - $page_title</title>";
      include './src/bit/htmlconfig.php';
      include './src/db/connect.php';
    ?>
</head>

<body>
    <main>
        <?php
          include './src/bit/navbar.php';
          include './src/bit/header.php';
        ?>
        <div class='columns is-centered'>
          <div class='column is-4'>
            <section class="container">
              <section class="cSpaceAfterHeaderTable">
                <form action="./src/post/mp_addentry.php" method="POST">
                <div class="field">
                  <label class="label">Empresa</label>
                  <div class="control">
                    <div class="select">
                      <select name='companyid' id='companyid'>
                      <?php
                      $sql = "SELECT * FROM entity WHERE isActive=1";

                      if ($results = $conn->query($sql)){
                        while ($row = $results->fetch_assoc()){
                          echo "<option value='" . $row['companyid'] . "'>". utf8_encode($row['companyName']) . "</option>";
                        }
                      }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                  <div class="field">
                    <label class="label">Status</label>
                    <div class="control">
                      <div class="select">
                        <select id="status" name="status">
                          <option value='1'>Aberta</option>
                          <option value='2'>Urgente</option>
                          <option value='0'>Fechada</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Problema</label>
                    <div class="control">
                      <textarea class="textarea" placeholder="Textarea" name='problem' id='problem'></textarea>
                    </div>
                  </div>

                <div class="field is-grouped">
                  <div class="control">
                    <button class="button is-link" name='submit' id='submit'>Adicionar</button>
                  </div>
                </div>
              </form>
            </section>
          </section>
          </div>
        </div>
    </main>
    <?php include './src/bit/footer.php'; ?>
</body>

</html>
