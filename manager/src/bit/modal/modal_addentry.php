<?php
include_once './../../db/connect.php';

$select_company = $db->prepare("SELECT * FROM man_entity WHERE isActive=1 ORDER BY companyName ASC");
$select_category = $db->prepare("SELECT * FROM man_managercategory ORDER BY categoryid ASC");

echo "<div class='modal' id='modal_add'>
<div class='modal-background'></div>
<div class='modal-card'>
    <header class='modal-card-head'>
        <p class='modal-card-title'>Nova ocorrência</p>
        <button id='cmodal' onclick='removeModal(`modal_add`);' class='delete is-large' aria-label='close'></button>
    </header>
        <form action='./src/post/mp_addentry.php' method='POST'>
        <section class='modal-card-body'>
            <div class='field'>
                <div class='field-body'>
                    <div class='field'>
                        <div class='control'>
                            <label class='label'>Empresa</label>
                            <div class='select $theme'>
                              <select name='companyid' id='companyid'>";
                              $select_company->execute();
                              while ($row = $select_company->fetch()){
                                echo "<option value='" . $row['companyid'] . "'>" . utf8_encode($row['companyName']) . "</option>";
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
            <option value='0'>Finalizada</option>
            <option value='1' selected>Pendente</option>
            <option value='2'>Urgente</option>
        </select>
    </div>
</div>
</div>
<div class='field'>
<div class='control'>
    <label class='label'>Sistema</label>
    <div class='select $theme'>
        <select id='entryCategory' name='entryCategory'>
        ";
        $select_category->execute();
        while ($row = $select_category->fetch()){
          echo "<option value='" . $row['categoryid'] . "'>" . utf8_encode($row['categoryName']) . "</option>";
        }
        echo "</select>
    </div>
</div>
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
