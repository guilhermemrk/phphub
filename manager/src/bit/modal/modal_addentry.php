<?php

session_start();
include_once './../../db/connect.php';
$dataTheme = $db->prepare("SELECT theme FROM hub_users WHERE username=?");
$dataTheme->execute([$_SESSION["username"]]);
$rowTheme = $dataTheme->fetch();

if ($rowTheme["theme"] == 0 || $rowTheme["theme"] == 1){
  $theme = '';
} elseif ($rowTheme["theme"] == 2) {
  $theme = 'is-dark';
}

$data = $db->query("SELECT * FROM man_entity WHERE isActive=1 ORDER BY companyName ASC");

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
                <div class='field-body'>
                    <div class='field'>
                        <div class='control'>
                            <label class='label'>Empresa</label>
                            <div class='select $theme'>
                              <select name='companyid' id='companyid'>";
            while ($row = $data->fetch()){
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
            <option value='1'>Pendente</option>
            <option value='2'>Urgente</option>
        </select>
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
