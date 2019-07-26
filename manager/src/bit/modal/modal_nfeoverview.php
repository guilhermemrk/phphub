<?php

  echo "<div class='modal' id='nfe_overview_modal'>
    <div class='modal-background'></div>
    <div class='modal-card'>
      <header class='modal-card-head'>
        <p class='modal-card-title'><span id='mnfe_model1'>$</span> #<span id='mnfe_titleid'>?</span></p>
        <button id='nfe_overview_close' onclick='removeModal(`nfe_overview_modal`)' class='delete is-large' aria-label='close'></button>
      </header>
      <section class='modal-card-body'>
      <table>
        <tr>
          <th class='ent_th_title' style='width: 30%;'>Entry ID:</th>
          <td class='ent_td_title' style='width: 50%;'><span id='mnfe_entryid'></span></td>
        </tr>
        <tr>
          <th class='ent_th_title'>Empresa:</th>
          <td class='ent_td_title'>[<span id='mnfe_companyid'>#</span>] <span id='mnfe_companyName'>#</span></td>
        </tr>
        <tr>
          <th class='ent_th_title'>Modelo:</th>
          <td class='ent_td_title'><span id='mnfe_model2'>#</span></td>
        </tr>
        <tr>
          <th class='ent_th_title'>Cod. Orcamento:</th>
          <td class='ent_td_title'><span id='mnfe_id'></span></td>
        </tr>
        <tr>
          <th class='ent_th_title'>Cod. Venda:</th>
          <td class='ent_td_title'><span id='mnfe_nv'></span></td>
        </tr>
        <tr>
          <th class='ent_th_title'>Numero da Nota:</th>
          <td class='ent_td_title'><span id='mnfe_nf'></span></td>
        </tr>
        <tr>
          <th class='ent_th_title'>Situação:</th>
          <td class='ent_td_title'><span id='mnfe_status'></span></td>
        </tr>
        <tr>
          <th class='ent_th_title'>Adicionado por:</th>
          <td class='ent_td_title'><span id='mnfe_addedby'></span></td>
        </tr>
        <tr>
          <th class='ent_th_title'>Data de adição:</th>
          <td class='ent_td_title'><span id='mnfe_entryDate'></span></td>
        </tr>
        <tr>
          <th class='ent_th_title'>Procedimento:</th>
          <td class='ent_td_title'><span id='mnfe_todo'></span></td>
        </tr>
        <tr>
          <th class='ent_th_title' style='width: 30%;'>Observação:</th>
          <td class='ent_td_title' style='width: 50%;'><span id='mnfe_problem'></span></td>
        </tr>
      </table>
      </section>
      <footer class='modal-card-foot'>
      </footer>
    </div>
  </div>";

?>
