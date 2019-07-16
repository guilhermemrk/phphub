<?php

echo "<div class='modal' id='clmodal'>
  <div class='modal-background'></div>
  <div class='modal-card'>
    <header class='modal-card-head'>
      <p class='modal-card-title'>Fechar entrada numero #<span id='closenumber'>#</span></p>
    </header>
    <section class='modal-card-body'>
      Você tem certeza que quer fechar esta entrada?
    </section>
    <footer class='modal-card-foot'>
      <button class='button is-danger' id='confirmclosenumber' onclick='window.location.href=``'>Fechar</button>
      <button id='mcl_cancel' class='button is-black' onClick='removeModal(`mcl_cancel`, `clmodal`);'>Cancelar</button>
    </footer>
  </div>
</div>";

?>
