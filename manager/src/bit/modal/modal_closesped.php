<?php

echo "<div class='modal' id='modal_spedclose'>
  <div class='modal-background'></div>
  <div class='modal-card'>
    <header class='modal-card-head'>
      <p class='modal-card-title'>O SPED da empresa <span id='spedCompanyName'>#</span> foi finalizado?</p>
      <button onclick='removeModal(`modal_spedclose`);' class='delete is-large' aria-label='close'></button>
    </header>
    <form id='confirmclosesped' action='' method='POST'>
    <footer class='modal-card-foot'>
      <button class='button is-danger is-focused is-fullwidth'>
        Sim
      </button>
    </footer>
    </form>
  </div>
</div>";

?>
