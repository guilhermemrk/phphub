<?php

  echo "<div class='modal' id='entry_overview_modal'>
    <div class='modal-background'></div>
    <div class='modal-card'>
      <header class='modal-card-head'>
        <p class='modal-card-title'>Entry #<span id='entry_titleid'>?</span></p>
        <button id='entry_overview_close' onclick='removeModal(`entry_overview_modal`)' class='delete is-large' aria-label='close'></button>
      </header>
      <section class='modal-card-body'>
      <table>
        <tr>
          <th class='ent_th_title' style='width: 30%;'>ID:</th>
          <td class='ent_td_title' style='width: 50%;'><span id='mentry_id'></span></td>
        </tr>
        <tr>
          <th class='ent_th_title'>Empresa:</th>
          <td class='ent_td_title'>[<span id='mentry_companyid'>#</span>] <span id='mentry_companyName'>#</span></td>
        </tr>
        <tr>
          <th class='ent_th_title'>Situação:</th>
          <td class='ent_td_title'><span id='mentry_status'></span></td>
        </tr>
        <tr>
          <th class='ent_th_title'>Adicionado por:</th>
          <td class='ent_td_title'><span id='mentry_addedby'></span></td>
        </tr>
        <tr>
          <th class='ent_th_title'>Data de adição:</th>
          <td class='ent_td_title'><span id='mentry_entryDate'></span></td>
        </tr>
        <tr>
          <th class='ent_th_title' style='width: 30%;'>Problema:</th>
          <td class='ent_td_title' style='width: 50%;'><span id='mentry_problem'></span></td>
        </tr>
      </table>
      </section>
      <footer class='modal-card-foot'>
      </footer>
    </div>
  </div>";

?>
