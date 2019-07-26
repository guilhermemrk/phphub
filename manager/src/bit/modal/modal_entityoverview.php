<?php

  echo "<div class='modal' id='ent_overview_modal'>
    <div class='modal-background'></div>
    <div class='modal-card'>
      <header class='modal-card-head'>
        <p class='modal-card-title' id='ent_modaltitle'>Empresa</p>
        <button id='ent_overview_close' onclick='removeModal(`ent_overview_modal`)' class='delete is-large' aria-label='close'></button>
      </header>
      <section class='modal-card-body'>
      <table>
        <tr>
          <th class='ent_th_title' style='width: 30%;'>ID:</th>
          <td class='ent_td_title' style='width: 50%;'><span id='ent_companyid'></span></td>
        </tr>
        <tr>
          <th class='ent_th_title'>Empresa:</th>
          <td class='ent_td_title'><span id='ent_companyName'></span></td>
        </tr>
        <tr>
          <th class='ent_th_title'>Telefone:</th>
          <td class='ent_td_title'><span id='ent_phone'></span></td>
        </tr>
        <tr>
          <th class='ent_th_title'>Telefone II:</th>
          <td class='ent_td_title'><span id='ent_phoneSec'></span></td>
        </tr>
        <tr>
          <th class='ent_th_title'>Email:</th>
          <td class='ent_td_title'><span id='ent_emailP'></span></td>
        </tr>
        <tr>
          <th class='ent_th_title'>Contador:</th>
          <td class='ent_td_title'><span id='ent_emailA'></span></td>
        </tr>
        <tr>
          <th class='ent_th_title'>Cidade:</th>
          <td class='ent_td_title'><span id='ent_city'></span></td>
        </tr>
        <tr>
          <th class='ent_th_title'>Acesso Remoto:</th>
          <td class='ent_td_title'><span id='ent_remoteLink'></span></td>
        </tr>
        <tr>
          <th class='ent_th_title'>Ativo?</th>
          <td class='ent_td_title'><span id='ent_isActive'></span></td>
        </tr>
        <tr>
          <th class='ent_th_title'>Adicionado por:</th>
          <td class='ent_td_title'><span id='ent_addedBy'></span></td>
        </tr>
        <tr>
          <th class='ent_th_title'>Data de adição:</th>
          <td class='ent_td_title'><span id='ent_dateAdded'></span></td>
        </tr>
      </table>
      </section>
      <footer class='modal-card-foot'>
      </footer>
    </div>
  </div>";

?>
