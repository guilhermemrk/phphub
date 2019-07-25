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
          <th style='width: 30%;'>ID:</th>
          <td style='width: 50%;'><span id='ent_companyid'></span></td>
        </tr>
        <tr>
          <th>Empresa:</th>
          <td><span id='ent_companyName'></span></td>
        </tr>
        <tr>
          <th>Telefone:</th>
          <td><span id='ent_phone'></span></td>
        </tr>
        <tr>
          <th>Telefone II:</th>
          <td><span id='ent_phoneSec'></span></td>
        </tr>
        <tr>
          <th>Email:</th>
          <td><span id='ent_emailP'></span></td>
        </tr>
        <tr>
          <th>Contador:</th>
          <td><span id='ent_emailA'></span></td>
        </tr>
        <tr>
          <th>Cidade:</th>
          <td><span id='ent_city'></span></td>
        </tr>
        <tr>
          <th>Acesso Remoto:</th>
          <td><span id='ent_remoteLink'></span></td>
        </tr>
        <tr>
          <th>Ativo?</th>
          <td><span id='ent_isActive'></span></td>
        </tr>
        <tr>
          <th>Adicionado por:</th>
          <td><span id='ent_addedBy'></span></td>
        </tr>
        <tr>
          <th>Data de adição:</th>
          <td><span id='ent_dateAdded'></span></td>
        </tr>
      </table>
      </section>
      <footer class='modal-card-foot'>
      </footer>
    </div>
  </div>";

?>
