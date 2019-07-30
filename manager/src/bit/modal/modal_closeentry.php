<?php

echo "<div class='modal' id='clmodal'>
  <div class='modal-background'></div>
  <div class='modal-card'>
    <header class='modal-card-head'>
      <p class='modal-card-title'>Fechar ocorrência número #<span id='closenumber'>#</span></p>
      <button id='clmodalb' onclick='removeModal(`clmodal`);' class='delete is-large' aria-label='close'></button>
    </header>
    <form id='confirmclosenumber' action='' method='POST'>
    <section class='modal-card-body'>
      <div class='field'>
          <label class='label'>Solução</label>
          <div class='control'>
              <textarea id='entrySolution' name='entrySolution' class='textarea $theme'></textarea>
          </div>
      </div>
    </section>
    <footer class='modal-card-foot'>
      <button class='button is-danger is-focused is-fullwidth'>
        <span class='icon is-small'><i class='fas fa-times'></i></span>
      </button>
    </footer>
    </form>
  </div>
</div>";

?>
