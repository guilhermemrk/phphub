<?php

echo "<div class='modal' id='modal_spededit'>
  <div class='modal-background'></div>
  <div class='modal-card'>
    <header class='modal-card-head'>
      <p class='modal-card-title'>Editando SPED - <span id='spedEditCompanyName'>#</span></p>
      <button onclick='removeModal(`modal_spededit`);' class='delete is-large' aria-label='close'></button>
    </header>
    <form id='confirmeditsped' action='' method='POST'>
    <section class='modal-card-body'>
    <div class='field'>
      <div class='control'>
        <label class='label'>Status</label>
          <div class='select $theme'>
            <select id='editsped_status' name='editsped_status'>
                <option value='1'>Pendente</option>
                <option value='2'>Em progresso</option>
                <option value='3'>Erro</option>
                <option value='4'>Urgente</option>
                <option value='5'>Urgente & Erro</option>
            </select>
          </div>
      </div>
    </div>
    </section>
    <footer class='modal-card-foot'>
      <button class='button is-warning is-focused is-fullwidth'>
        <span class='icon is-small'>
          <i class='fas fa-check'></i>
        </span>
      </button>
    </footer>
    </form>
  </div>
</div>";

?>
