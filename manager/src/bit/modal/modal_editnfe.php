<?php

echo "<div class='modal' id='modal_edit_nfe'>
<div class='modal-background'></div>
<div class='modal-card'>
    <header class='modal-card-head'>
        <p class='modal-card-title'>Editando NFe #<span id='nfe_edit_number'>#</span></p>
        <button id='editcnfemodal' onclick='removeModal(`modal_edit_nfe`);' class='delete is-large' aria-label='close'></button>
    </header>
        <form id='edit_nfeform' action='' method='POST'>
    <section class='modal-card-body'>
            <div class='field'>
                <div class='field-body'>
                <div class='field has-addons'>
                    <div class='field-body'>
                        <div class='field has-addons'>
                          <div class='control'>
                            <label class='label' style='margin-left: 20%;'>ID</label>
                            <span id='edit_nfe_companyid' class='button $theme'>#</span>
                            </div>
                            <div class='control'>
                                <label class='label'>Empresa</label>
                                <input id='editnfe_companyName' type='text' class='input $theme' disabled>
                                </div>
                        </div>
                    </div>
                </div>
<div class='field'>
<div class='control'>
<label class='label'>Status</label>
<div class='select $theme'>
<select id='editnfe_status' name='editnfe_status'>
    <option value='20'>Finalizada</option>
    <option value='21'>Pendente</option>
    <option value='22'>Urgente</option>
</select>
</div>
</div>
</div>
<div class='field'>
<div class='control'>
<label class='label'>Modelo</label>
<div class='select $theme'>
<select id='editnfe_model' name='editnfe_model'>
    <option value='55'>NFe</option>
    <option value='65'>NFCe</option>
    <option value='99'>Outro</option>
</select>
</div>
</div>
</div>
<div class='field'>
<div class='control'>
<label class='label'>Procedimento</label>
<div class='select $theme'>
<select id='editnfe_procedure' name='editnfe_procedure'>
    <option value='0'>Cancelar</option>
    <option value='1'>Autorizar</option>
    <option value='2'>Inutilizar</option>
    <option value='3'>Outro</option>
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
<label class='label'>ID</label>
<input id='editnfe_id' name='editnfe_id' type='text' class='input $theme' value=''>
</div>
</div>
<div class='field'>
<div class='control'>
<label class='label'>NV</label>
<input id='editnfe_nv' name='editnfe_nv' type='text' class='input $theme' value=''>
</div>
</div>
<div class='field'>
<p class='control'>
<label class='label'>NF</label>
<input id='editnfe_nf' name='editnfe_nf' type='text' class='input $theme' value=''>
</p>
</div>
</div>
</div>
<div class='field'>
<label class='label'>Problema</label>
<div class='control'>
<textarea class='textarea $theme' placeholder='Textarea' name='editnfe_problem' id='editnfe_problem'></textarea>
</div>
</div>
<div class='field'>
    <label class='label'>Solução</label>
    <div class='control'>
        <textarea id='editnfe_Solution' name='editnfe_Solution' class='textarea $theme'></textarea>
    </div>
</div>
</section>
<footer class='modal-card-foot'>
<button class='button is-warning is-fullwidth is-focused' value='1'>
<span class='icon is-small'>
<i class='fas fa-check'></i>
</span>
</button>
</footer>
</form>
</div>
</div>";

?>
