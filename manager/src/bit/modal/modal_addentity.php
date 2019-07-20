<?php

$data = $db->query("SELECT * FROM man_cep ORDER BY cityName ASC");

echo "<div class='modal' id='modal_add_entity'>
    <div class='modal-background'></div>
    <div class='modal-card'>
        <header class='modal-card-head'>
            <p class='modal-card-title'>Nova entidade</p>
            <button id='clentmodal' onclick='removeModal(`clentmodal`, `modal_add_entity`);' class='modal-close is-large' aria-label='close'></button>
        </header>
        <section class='modal-card-body'>
            <form action='./src/post/mp_addentity.php' method='POST'>
              <div class='field'>
              <div class='field-body'>
              <div class='field'>
              <div class='control'>
              <label class='label'>Nome</label>
              <input id='entity_name' name='entity_name' type='text' class='input'>
              </div>
              </div>
              <div class='field'>
                  <div class='control'>
                      <label class='label'>Status</label>
                      <div class='select'>
                          <select id='entity_status' name='entity_status'>
                            <option value='1'>Ativo</option>
                            <option value='0'>Inativo</option>
                          </select>
                      </div>
                  </div>
              </div>
              </div>
              </div>
              <div class='field'>
                  <div class='field-body'>
                      <div class='field'>
                          <div class='control'>
                              <label class='label'>Cidade</label>
                              <div class='select'>
                                  <select id='entity_city' name='entity_city'>";
            while ($row = $data->fetch()){
              echo "<option value='" . $row['cityid'] . "'>" . utf8_encode($row['cityName']) . "</option>";
            }
      echo "</select>
  </div>
</div>
</div>
<div class='field'>
    <div class='control'>
        <label class='label'>Estado</label>
        <div class='select'>
            <select id='entity_state' name='entity_state' disabled>
              <option value='1'>
                Mato Grosso
              </option>
            </select>
</div>
</div>
</div>
<div class='field'>
    <div class='control'>
        <label class='label'>País</label>
        <div class='select'>
            <select id='entity_country' name='entity_country' disabled>
              <option value='1'>
                Brasil
              </option>
            </select>
</div>
</div>
</div>
</div>
</div>
<div class='field'>
<div class='field-body'>
<div class='field'>
<div class='control'>
<label class='label'>Telefone</label>
<input id='entity_tel1' name='entity_tel1' type='text' class='input'>
</div>
</div>
<div class='field'>
<div class='control'>
  <label class='label'>Telefone II</label>
  <input id='entity_tel2' name='entity_tel2' type='text' class='input'>
</div>
</div>
</div>
</div>
<div class='field'>
<div class='field-body'>
<div class='field'>
<div class='control'>
<label class='label'>Email</label>
<input id='entity_email' name='entity_email' type='text' class='input'>
</div>
</div>
<div class='field'>
<div class='control'>
  <label class='label'>Email do Contador</label>
  <input id='entity_emaila' name='entity_emaila' type='text' class='input'>
</div>
</div>
</div>
</div>
<footer class='modal-card-foot'>
<button class='button is-success is-fullwidth is-focused' name='submit' id='submit'>
<span class='icon is-small'>
<i class='fas fa-check'></i>
</span>
</button>
</footer>
</form>
</section>
</div>
</div>";
?>
