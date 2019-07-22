<?php

session_start();
include_once './../../../db/connect.php';
$data = $db->prepare("SELECT theme FROM hub_users WHERE username=?");
$data->execute([$_SESSION["username"]]);
$row = $data->fetch();

    echo "<section class='manager_options'>
      <div class='columns'>
        <div class='column is-2'>
          <div class='container'>
            <div class='manager_options_label'>Ocorrências</div>
          </div>
          <div class='container'>
          <button id='omodal' onclick='addModal(`omodal`, `modal_add`);' class='button is-small is-success'>
            <span class='icon is-small'>
              <i class='fas fa-plus'></i>
            </span>
          </button>
          <button onclick='window.location.href=`./manager.php`' class='button is-small is-info'>
            <span class='icon is-small'>
              <i class='fas fa-asterisk'></i>
            </span>
          </button>
          <button onclick='window.location.href=`./manager.php?filter=1`' class='button is-small is-info'>
            <span class='icon is-small'>
              <i class='fas fa-envelope-open-text'></i>
            </span>
          </button>
          <button onclick='window.location.href=`./manager.php?filter=0`' class='button is-danger is-small'>
            <span class='icon is-small'>
              <i class='fas fa-times'></i>
            </span>
          </button>
          <button onclick='window.location.href=`./manager.php?filter=2`' class='button is-warning is-small'>
            <span class='icon is-small'>
              <i class='fas fa-exclamation-triangle'></i>
            </span>
          </button>
          </div>
        </div>
        <div class='column is-2'>
          <div class='container'>
            <div class='manager_options_label'>NFe</div>
          </div>
          <div class='container'>
          <button id='addnfemodal' onclick='addModal(`addnfemodal`, `modal_add_nfe`);' class='button is-small is-success'>
            <span class='icon is-small'>
              <i class='fas fa-plus'></i>
            </span>
          </button>
          <button onclick='window.location.href=`./manager.php?nfe`' class='button is-small is-info'>
            <span class='icon is-small'>
              <i class='fas fa-asterisk'></i>
            </span>
          </button>
          <button onclick='window.location.href=`./manager.php?nfe&filter=21`' class='button is-small is-info'>
            <span class='icon is-small'>
              <i class='fas fa-envelope-open-text'></i>
            </span>
          </button>
          <button onclick='window.location.href=`./manager.php?nfe&filter=20`' class='button is-danger is-small'>
            <span class='icon is-small'>
              <i class='fas fa-times'></i>
            </span>
          </button>
          <button onclick='window.location.href=`./manager.php?nfe&filter=22`' class='button is-warning is-small'>
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
          <button id='addentitymodal' onclick='addModal(`addentitymodal`, `modal_add_entity`);' class='button is-small is-success'>
            <span class='icon is-small'>
              <i class='fas fa-plus'></i>
            </span>
          </button>
          <button onclick='window.location.href=`./manager.php?entity`' class='button is-small is-info'>
            <span class='icon is-small'>
              <i class='fas fa-asterisk'></i>
            </span>
          </button>
          <button onclick='window.location.href=`./manager.php?entity&filter=31`' class='button is-small is-info'>
            <span class='icon is-small'>
              <i class='fas fa-check'></i>
            </span>
          </button>
          <button onclick='window.location.href=`./manager.php?entity&filter=30`' class='button is-small is-danger'>
            <span class='icon is-small'>
              <i class='fas fa-times'></i>
            </span>
          </button>
          </div>
        </div>
        <div class='column is-3'>&nbsp;</div>
        <div class='column is-4'>
          <div class='container'>
          <div class='main_searchbar'>
            <div class='field has-addons'>";

            if ($row['theme'] == 0 || $row['theme'] == 1){
              echo "<div class='control has-icons-left'>
                <input type='text' class='input is-light'>
              </div>
              <div class='control'>
                  <a class='button is-light'>";
            } elseif ($row['theme'] == 2){
              echo "<div class='control has-icons-left'>
                <input type='text' class='input is-primary'>
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
