<?php

  session_start();
  include_once './../../../db/connect.php';
  $sUsergroup = $_SESSION["login"][1];
  $nfe = $_GET["nfe"];
  $filter_company = $db->prepare("SELECT * FROM man_entity WHERE isActive=1 AND entgroup=$sUsergroup ORDER BY companyName ASC");

?>

<section class='manager_options'>
    <div class='columns'>
        <div class='column is-2'>
            <div class='container'>
              <div class='field'>
                  <div class='control'>
                      <label class='manager_options_label'>Ocorrências</label>
                      <div class='field'>
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
              </div>
            </div>
        </div>
        <div class='column is-2'>
            <div class='container'>
              <div class='field'>
                  <div class='control'>
                      <label class='manager_options_label'>NFe/NFCe</label>
                      <div class='field'>
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
              </div>
            </div>
        </div>
        <div class='column is-2'>
            <div class='container'>
              <div class='field'>
                  <div class='control'>
                      <label class='manager_options_label'>Entidades</label>
                      <div class='field'>
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
              </div>
            </div>
        </div>
        <div class='column is-2'>
            <div class='container'>
              <div class='field'>
                  <div class='control'>
                      <label class='manager_options_label'>SPED</label>
                      <div class='field'>
                        <button onclick='window.location.href=`./manager.php?sped`' class='button is-small is-info tooltip is-tooltip-bottom is-tooltip-info' data-tooltip='Todos os SPEDs'>
                            <span class='icon is-small'>
                      <i class='fas fa-asterisk'></i>
                    </span>
                        </button>
                        <button onclick='window.location.href=`./manager.php?sped&filter=1`' class='button is-small is-light tooltip is-tooltip-bottom is-tooltip-light' data-tooltip='SPEDs pendentes'>
                            <span class='icon is-small'>
                      <i class='fas fa-times'></i>
                    </span>
                        </button>
                        <button onclick='window.location.href=`./manager.php?sped&filter=0`' class='button is-small is-dark tooltip is-tooltip-bottom is-tooltip-dark' data-tooltip='SPEDs enviados'>
                            <span class='icon is-small'>
                      <i class='fas fa-check'></i>
                    </span>
                        </button>
                      </div>
                  </div>
              </div>
            </div>
        </div>
        <div class='column is-3'>
            <div class='container'>
              <?php if (is_NULL($sped) && is_NULL($entity)){
                echo "<div class='field'>
                    <div class='control'>
                        <label class='manager_options_label'>Filtrar por Empresa</label>
                        <div class='select is-fullwidth is-small'>
                            <select onchange='if (this.value) window.location.href=this.value'>
                                <option value='' selected>Selecione uma empresa.</option>";
                                    $filter_company->execute();
                                    while ($row = $filter_company->fetch()){
                                      if (is_NULL($nfe)){
                                        echo "<option value='?fcompany=" . $row['companyid'] . "'>" . utf8_encode($row['companyName']) . "</option>";
                                      } else {
                                        echo "<option value='?nfe&fcompany=" . $row['companyid'] . "'>" . utf8_encode($row['companyName']) . "</option>";
                                      }
                                    }
                            echo"</select>
                        </div>
                    </div>
                </div>";
                } ?>
            </div>
        </div>
    </div>
</section>
