<?php

    echo "<section class='manager_options'>
      <div class='columns'>
        <div class='column is-2'>
          <div class='container'>
            <div class='manager_options_label'>Ocorrências</div>
          </div>
          <div class='container'>
          <button id='omodal' onclick='addModal(`modal_add`);' class='button is-small is-success tooltip is-tooltip-bottom is-tooltip-primary' data-tooltip='Nova ocorrência'>
            <span class='icon is-small'>
              <i class='fas fa-plus'></i>
            </span>
          </button>
          <button onclick='window.location.href=`./manager.php`' class='button is-small is-info tooltip is-tooltip-bottom is-tooltip-info' data-tooltip='Todas as ocorrências'>
            <span class='icon is-small'>
              <i class='fas fa-asterisk'></i>
            </span>
          </button>
          <button onclick='window.location.href=`./manager.php?filter=1`' class='button is-small is-info tooltip is-tooltip-bottom is-tooltip-info' data-tooltip='Ocorrências pendentes'>
            <span class='icon is-small'>
              <i class='fas fa-envelope-open-text'></i>
            </span>
          </button>
          <button onclick='window.location.href=`./manager.php?filter=0`' class='button is-danger is-small tooltip is-tooltip-bottom is-tooltip-danger' data-tooltip='Ocorrências finalizadas'>
            <span class='icon is-small'>
              <i class='fas fa-times'></i>
            </span>
          </button>
          <button onclick='window.location.href=`./manager.php?filter=2`' class='button is-warning is-small tooltip is-tooltip-bottom is-tooltip-warning' data-tooltip='Ocorrências urgentes'>
            <span class='icon is-small'>
              <i class='fas fa-exclamation-triangle'></i>
            </span>
          </button>
          </div>
        </div>
        <div class='column is-2'>
          <div class='container'>
            <div class='manager_options_label'>NFe/NFCe</div>
          </div>
          <div class='container'>
          <button id='addnfemodal' onclick='addModal(`modal_add_nfe`);' class='button is-small is-success tooltip is-tooltip-bottom is-tooltip-success' data-tooltip='Nova NFe/NFCe'>
            <span class='icon is-small'>
              <i class='fas fa-plus'></i>
            </span>
          </button>
          <button onclick='window.location.href=`./manager.php?nfe`' class='button is-small is-info tooltip is-tooltip-bottom is-tooltip-info' data-tooltip='Todas as NFe/NFCe'>
            <span class='icon is-small'>
              <i class='fas fa-asterisk'></i>
            </span>
          </button>
          <button onclick='window.location.href=`./manager.php?nfe&filter=21`' class='button is-small is-info tooltip is-tooltip-bottom is-tooltip-info' data-tooltip='NFe/NFCe pendentes'>
            <span class='icon is-small'>
              <i class='fas fa-envelope-open-text'></i>
            </span>
          </button>
          <button onclick='window.location.href=`./manager.php?nfe&filter=20`' class='button is-danger is-small tooltip is-tooltip-bottom is-tooltip-danger' data-tooltip='NFe/NFCe finalizadas'>
            <span class='icon is-small'>
              <i class='fas fa-times'></i>
            </span>
          </button>
          <button onclick='window.location.href=`./manager.php?nfe&filter=22`' class='button is-warning is-small tooltip is-tooltip-bottom is-tooltip-warning' data-tooltip='NFe/NFCe urgentes'>
            <span class='icon is-small'>
              <i class='fas fa-exclamation-triangle'></i>
            </span>
          </button>
          </div>
        </div>
        <div class='column is-2'>
          <div class='container'>
            <div class='manager_options_label'>Entidades</div>
          </div>
          <div class='container'>
          <button id='addentitymodal' onclick='addModal(`modal_add_entity`);' class='button is-small is-success tooltip is-tooltip-bottom is-tooltip-success' data-tooltip='Nova entidade'>
            <span class='icon is-small'>
              <i class='fas fa-plus'></i>
            </span>
          </button>
          <button onclick='window.location.href=`./manager.php?entity`' class='button is-small is-info tooltip is-tooltip-bottom is-tooltip-info' data-tooltip='Todas as entidades'>
            <span class='icon is-small'>
              <i class='fas fa-asterisk'></i>
            </span>
          </button>
          <button onclick='window.location.href=`./manager.php?entity&filter=31`' class='button is-small is-info tooltip is-tooltip-bottom is-tooltip-info' data-tooltip='Entidades ativas'>
            <span class='icon is-small'>
              <i class='fas fa-check'></i>
            </span>
          </button>
          <button onclick='window.location.href=`./manager.php?entity&filter=30`' class='button is-small is-danger tooltip is-tooltip-bottom is-tooltip-danger' data-tooltip='Entidades inativas'>
            <span class='icon is-small'>
              <i class='fas fa-times'></i>
            </span>
          </button>
          </div>
        </div>
        <div class='column is-2'>
          <div class='container'>
            <div class='manager_options_label'>SPED</div>
          </div>
          <div class='container'>
          <!--button id='addentitymodal' onclick='' class='button is-small is-success'>
            <span class='icon is-small'>
              <i class='fas fa-plus'></i>
            </span>
          </button-->
          <button onclick='window.location.href=`./manager.php?sped`' class='button is-small is-info tooltip is-tooltip-bottom is-tooltip-info' data-tooltip='Todos os SPEDs'>
            <span class='icon is-small'>
              <i class='fas fa-asterisk'></i>
            </span>
          </button>
          <button onclick='window.location.href=`./manager.php?sped&filter=1`' class='button is-small is-light tooltip is-tooltip-bottom is-tooltip-light' data-tooltip='SPEDs enviados'>
            <span class='icon is-small'>
              <i class='fas fa-times'></i>
            </span>
          </button>
          <button onclick='window.location.href=`./manager.php?sped&filter=0`' class='button is-small is-dark tooltip is-tooltip-bottom is-tooltip-dark' data-tooltip='SPEDs pendentes'>
            <span class='icon is-small'>
              <i class='fas fa-check'></i>
            </span>
          </button>
          <!--button onclick='window.location.href=`./manager.php?sped&filter=2`' class='button is-small is-primary'>
            <span class='icon is-small'>
              <i class='fas fa-check'></i>
            </span>
          </button>
          <button onclick='window.location.href=`./manager.php?sped&filter=3`' class='button is-small is-warning'>
            <span class='icon is-small'>
              <i class='fas fa-times'></i>
            </span>
          </button>
          <button onclick='window.location.href=`./manager.php?sped&filter=5`' class='button is-small is-info'>
            <span class='icon is-small'>
              <i class='fas fa-times'></i>
            </span>
          </button-->
          </div>
        </div>
        <div class='column is-3'>
          <div class='container'>
          <div class='main_searchbar'>
            <div class='field has-addons'>";

            if ($row["theme"] == 0 || $row["theme"] == 1){
              echo "<div class='control has-icons-left'>
                <input type='text' class='input is-light' disabled>
              </div>
              <div class='control'>
                  <a class='button is-light'>";
            } elseif ($row["theme"] == 2){
              echo "<div class='control has-icons-left'>
                <input type='text' class='input is-primary' disabled>
              </div>
              <div class='control'>
                  <a class='button is-primary'>";
            }

                    echo "<span class='icon is-medium is-right'>
                      <i class='fa fa-search'></i>
                    </span>
                  </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>";
?>
