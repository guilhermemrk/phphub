<?php
session_start();

include_once './../../db/connect.php';

$data = $db->query("SELECT * FROM man_cep ORDER BY cityName ASC");

echo "<div class='modal' id='modal_edit_entity'>
    <div class='modal-background'></div>
    <div class='modal-card'>
        <header class='modal-card-head'>
            <p class='modal-card-title'>Editando a entidade <span id='editentity_companyid'>#</span> - <span id='editentity_title'>?</span></p>
            <button id='medit_entity' onclick='removeModal(`modal_edit_entity`);' class='delete is-large' aria-label='close'></button>
        </header>
            <form id='editentity_form' action='' method='POST'>
        <section class='modal-card-body'>
              <div class='field'>
              <div class='field-body'>
              <div class='field'>
              <div class='control'>
              <label class='label'>Nome</label>
              <input id='editentity_name' name='editentity_name' type='text' class='input $theme' disabled>
              </div>
              </div>
              <div class='field'>
                  <div class='control'>
                      <label class='label'>Status</label>
                      <div class='select $theme'>
                          <select id='editentity_status' name='editentity_status'>
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
                              <div class='select $theme'>
                                  <select id='editentity_city' name='editentity_city'>";
            while ($row = $data->fetch()){
              echo "<option value='" . $row['cityid'] . "'>" . utf8_encode($row['cityName']) . "</option>";
            }
      echo "</select>
</div>
</div>
</div>
<div class='field'>
    <div class='control'>
        <label class='label'>SPED</label>
        <div class='select $theme'>
            <select id='editentity_sped' name='editentity_sped'>
              <option value='1'>
                Sim
              </option>
              <option value='0' selected>
                Não
              </option>
            </select>
</div>
</div>
</div>
<!--div class='field'>
<div class='control'>
<label class='label'>Estado</label>
<div class='select $theme'>
<select id='editentity_state' name='editentity_state' disabled>
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
<div class='select $theme'>
<select id='editentity_country' name='editentity_country' disabled>
<option value='1'>
Brasil
</option>
</select>
</div>
</div>
</div-->
</div>
</div>
<div class='field'>
<div class='field-body'>
<div class='field'>
<div class='control'>
<label class='label'>Telefone</label>
<input id='editentity_tel1' name='editentity_tel1' type='text' class='input $theme'>
</div>
</div>
<div class='field'>
<div class='control'>
<label class='label'>Telefone II</label>
<input id='editentity_tel2' name='editentity_tel2' type='text' class='input $theme'>
</div>
</div>
</div>
</div>
<div class='field'>
<div class='field-body'>
<div class='field'>
<div class='control'>
<label class='label'>Email</label>
<input id='editentity_email' name='editentity_email' type='text' class='input $theme'>
</div>
</div>
<div class='field'>
<div class='control'>
<label class='label'>Email do Contador</label>
<input id='editentity_emaila' name='editentity_emaila' type='text' class='input $theme'>
</div>
</div>
</div>
</div>
</section>
<footer class='modal-card-foot'>
<button class='button is-success is-fullwidth is-focused' name='submit' id='submit'>
<span class='icon is-small'>
<i class='fas fa-check'></i>
</span>
</button>
</footer>
</form>
</div>
</div>";
?>
