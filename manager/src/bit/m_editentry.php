<?php

echo "<div class='modal' id='edmodal'>
  <div class='modal-background'></div>
  <div class='modal-card'>
    <header class='modal-card-head'>
      <p class='modal-card-title'>Editar ocorrência #<span id='m_edit_number'>#</span></p>
      <button id='cemodal' onclick='removeModal(`cemodal`, `edmodal`);' class='modal-close is-large' aria-label='close'></button>
    </header>
    <section class='modal-card-body'>
    <form id='edit_entryForm' action='' method='POST'>
      <div class='field'>
        <label class='label'>ID</label>
        <div class='control'>
          <input id='edit_entryid' class='input' type='text' placeholder='' disabled>
        </div>
      </div>
      <div class='field'>
        <label class='label'>Empresa</label>
        <div class='control'>
          <input id='edit_companyName' class='input' type='text' placeholder='' disabled>
        </div>
      </div>
    <div class='field'>
      <label class='label'>Data</label>
      <div class='control'>
        <input id='edit_entryDate' class='input' type='text' placeholder='' disabled>
      </div>
    </div>
    <div class='field'>
      <label class='label'>Status</label>
      <div class='control'>
        <div class='select'>
          <select id='edit_entryStatus' name='edit_entryStatus'>
            <option value='0'>Finalizada</option>
            <option value='1'>Pendente</option>
            <option value='2'>Urgente</option>
          </select>
        </div>
      </div>
    </div>
    <div class='field'>
      <label class='label'>Problema</label>
      <div class='control'>
        <textarea id='edit_entryProblem' name='edit_entryProblem' class='textarea' placeholder=''></textarea>
      </div>
    </div>
    <footer class='modal-card-foot'>
      <button class='button is-warning is-fullwidth is-focused' id='edit_entrySubmit'>
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
