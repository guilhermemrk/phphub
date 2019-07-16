<?php

$sql = 'SELECT * FROM entity WHERE isActive=1 ORDER BY companyName ASC';

echo "<div class='modal' id='modal_add'>
  <div class='modal-background'></div>
  <div class='modal-card'>
    <header class='modal-card-head'>
      <p class='modal-card-title'>Nova ocorrência</p>
      <button id='cmodal' onclick='removeModal(`cmodal`, `modal_add`);' class='modal-close is-large' aria-label='close'></button>
    </header>
    <section class='modal-card-body'>
    <form action='./src/post/mp_addentry.php' method='POST'>
    <div class='field'>
      <label class='label'>Empresa</label>
      <div class='control'>
        <div class='select'>
          <select name='companyid' id='companyid'>";

          if ($results = $conn->query($sql)){
            while ($row = $results->fetch_assoc()){
              echo "<option value='" . $row['companyid'] . "'>" . utf8_encode($row['companyName']) . "</option>";
            }
          }

echo "</select>
      </div>
    </div>
  </div>
        <div class='field'>
          <label class='label'>Status</label>
          <div class='control'>
            <div class='select'>
              <select id='status' name='status'>
                <option value='1'>Aberta</option>
                <option value='2'>Urgente</option>
                <option value='0'>Finalizada</option>
              </select>
            </div>
          </div>
        </div>
        <div class='field'>
          <label class='label'>Problema</label>
          <div class='control'>
            <textarea class='textarea' placeholder='Textarea' name='problem' id='problem'></textarea>
          </div>
        </div>
      </section>
      <footer class='modal-card-foot'>
        <button class='button is-success' name='submit' id='submit'>Adicionar</button>
      </footer>
    </form>
    </div>
  </div>";
?>
