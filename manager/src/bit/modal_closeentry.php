<?php

echo "<div class='modal' id='clmodal'>
  <div class='modal-background'></div>
  <div class='modal-card'>
    <header class='modal-card-head'>
      <p class='modal-card-title'>Fechar ocorrência número #<span id='closenumber'>#</span></p>
    </header>
    <section class='modal-card-body'>
      Você tem certeza que quer fechar esta entrada?
    </section>
    <footer class='modal-card-foot'>
      <button class='button is-danger is-focused' id='confirmclosenumber' onclick='window.location.href=``'>
        <span class='icon is-small'><i class='fas fa-times'></i></span>
      </button>
      <button id='mcl_cancel' class='button is-black' onClick='removeModal(`mcl_cancel`, `clmodal`);'><span class='button_text_fix'>Cancelar</span></button>
    </footer>
  </div>
</div>";

?>
