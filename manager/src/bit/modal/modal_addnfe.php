<?php
include_once './../../db/connect.php';

$data = $db->query("SELECT * FROM man_entity WHERE isActive=1 ORDER BY companyName ASC");


echo "<div class='modal' id='modal_add_nfe'>
<div class='modal-background'></div>
<div class='modal-card'>
    <header class='modal-card-head'>
        <p class='modal-card-title'>Nova NFe</p>
        <button id='cnfemodal' onclick='removeModal(`modal_add_nfe`);' class='delete is-large' aria-label='close'></button>
    </header>
        <form action='./src/post/mp_addnfe.php' method='POST'>
    <section class='modal-card-body'>
            <div class='field'>
                <div class='field-body'>
                    <div class='field'>
                        <div class='control'>
                            <label class='label'>Empresa</label>
                            <div class='select $theme'>
                                <select id='companyid' name='companyid'>";

                                while ($row = $data->fetch()){
                                  if (strlen($row['companyName']) > 20){ $companyName = substr($row['companyName'], 0, 20); $companyName .= '...'; } else { $companyName = $row['companyName']; }
                                  echo "<option value='" . $row['companyid'] . "'>" . utf8_encode($companyName) . "</option>";
                                }

echo "</select>
</div>
</div>
</div>
<div class='field'>
<div class='control'>
<label class='label'>Status</label>
<div class='select $theme'>
<select id='status' name='status'>
    <option value='21'>Pendente</option>
    <option value='20'>Finalizada</option>
    <option value='22'>Urgente</option>
</select>
</div>
</div>
</div>
<div class='field'>
<div class='control'>
<label class='label'>Modelo</label>
<div class='select $theme'>
<select id='nfe_model' name='nfe_model'>
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
<select id='nfe_procedure' name='nfe_procedure'>
    <option value='1'>Autorizar</option>
    <option value='0'>Cancelar</option>
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
<label class='label'>Cod. Orcamento (ID)</label>
<input id='nfe_id' name='nfe_id' type='text' class='input $theme' value=''>
</div>
</div>
<div class='field'>
<div class='control'>
<label class='label'>Número da Venda (NV)</label>
<input id='nfe_nv' name='nfe_nv' type='text' class='input $theme' value=''>
</div>
</div>
<div class='field'>
<p class='control'>
<label class='label'>Número da Nota (NF)</label>
<input id='nfe_nf' name='nfe_nf' type='text' class='input $theme' value=''>
</p>
</div>
</div>
</div>
<div class='field'>
<label class='label'>Problema</label>
<div class='control'>
<textarea class='textarea $theme' name='problem' id='problem'></textarea>
</div>
</div>
</section>
<footer class='modal-card-foot'>
<button class='button is-success is-fullwidth is-focused' value='1'>
<span class='icon is-small'>
<i class='fas fa-check'></i>
</span>
</button>
</footer>
</form>
</div>
</div>";
?>
