<?php
    echo "<table class='table is-bordered is-fullwidth'>
      <thead>
        <tr>
            <th class='mopt-status'></th>
            <th class='company-name'>Empresa</th>
            <th class='m-entrydate'>Data de Entrada</th>
            <th class='mopt-box'>Modelo</th>
            <th class='mopt-box'>ID</th>
            <th class='mopt-box'>NV</th>
            <th class='mopt-box'>NF</th>
            <th class='nfe-todo-box'>Procedimento</th>
            <th>Observação</th>
            <th class='mopt-box'>&nbsp;</th>
            <th class='mopt-box'>&nbsp;</th>
        </tr>
      </thead>
      <tbody>";

if (is_NULL($page)){ $page = 1; }
if ($page == 1){ $sqlpagination = 0; } else { $sqlpagination = $maxperpage*($page-1); }

if (is_NULL($filter)){
$data = $db->query("SELECT m.addedBy AS m_addedby, m.*, e.*, c.*
                    FROM man_manager AS m
                    JOIN man_entity AS e
                    ON m.companyid = e.companyid
                    JOIN man_cep AS c
                    ON e.city = c.cityid
                    WHERE m.status IN (20,21,22)
                    ORDER BY m.status DESC, m.entryDate DESC
                    LIMIT $sqlpagination, $maxperpage");
} else {
$data = $db->prepare("SELECT m.addedBy AS m_addedby, m.*, e.*, c.*
                    FROM man_manager AS m
                    JOIN man_entity AS e
                    ON m.companyid = e.companyid
                    JOIN man_cep AS c
                    ON e.city = c.cityid
                    WHERE m.status IN ($filter)
                    ORDER BY m.status DESC, m.entryDate DESC
                    LIMIT $sqlpagination, $maxperpage");
$data->execute([$filter]);
}



while ($row = $data->fetch()) {
  $m_entryid = $row["entryid"];
  $m_companyid = $row["companyid"];
  $m_companyname = utf8_encode($row["companyName"]);
  $nfe_model = utf8_encode($row["nfe_modelo"]);
  $nfe_id = utf8_encode($row["nfe_id"]);
  $nfe_nv = utf8_encode($row["nfe_nv"]);
  $nfe_nf = utf8_encode($row["nfe_nf"]);
  $m_entrydate = $row["entryDate"];
  $m_problem = ucfirst(utf8_encode($row["problem"]));
  $m_status = $row["status"];
  $m_status_formatted = substr($row["status"], 1, 2);
  $m_addedby = $row["m_addedby"];
  $nfe_todo = utf8_encode($row["nfe_todo"]);
  $ent_phone = $row["phone"];
  $ent_phoneSec = $row["phoneSec"];
  $ent_email = $row["emailPrimary"];
  $ent_emaila = $row["emailAccountant"];
  $ent_active = $row["isActive"];
  $ent_addedby = $row["addedBy"];
  $ent_city = utf8_encode($row["cityName"]);
  $ent_dateAdded = $row["dateAdded"];
  $ent_remoteLink = $row["remoteLink"];


  if ($nfe_model == '55'){ $nfe_model_formatted = 'NFe'; } elseif ($nfe_model == '65'){ $nfe_model_formatted = 'NFCe'; } elseif ($nfe_model == '99'){ $nfe_model_formatted = 'Outro'; }
  if (is_numeric($nfe_todo) && $nfe_todo == 0){ $nfe_todo_formatted = 'Cancelar'; } elseif ($nfe_todo == 1){ $nfe_todo_formatted = 'Autorizar'; } elseif ($nfe_todo == 2){ $nfe_todo_formatted = 'Inutilizar'; } elseif ($nfe_todo == 3){ $nfe_todo_formatted = 'Outro'; }
  if (strlen($m_problem) >= 45){ $m_problemFormatted = substr(utf8_encode($row["problem"]), 0, 45); $m_problemFormatted .= '...'; } elseif (is_NULL($row["problem"]) || strlen($row["problem"]) == 0){ $m_problemFormatted = 'Não informado.'; } else { $m_problemFormatted = utf8_encode($m_problem); }
  if (strlen($m_companyname) >= 20){ $m_companyname = substr($row["companyName"], 0, 20); $m_companyname .= '...'; }
  if (strlen($m_entrydate) >= 11){ $m_entrydateFormatted = substr($row["entryDate"], 0, 10); } else {$m_entrydateFormatted = $m_entrydate; }

  echo "<tr class='trline$m_status_formatted'>
          <td class='trstatus$m_status_formatted'>&nbsp;</td>
          <td><a onclick='entityOverview(`$m_companyid`, `$m_companyname`, `$ent_phone`, `$ent_phoneSec`, `$ent_email`, `$ent_emaila`, `$ent_active`, `$ent_addedby`, `$ent_city`, `$ent_dateAdded`, `$ent_remoteLink`); addModal(`ent_overview_modal`);'>" . ucfirst($m_companyname) . "</a></td>
          <td class='txtalgncenter'>$m_entrydateFormatted</td>
          <td class='txtalgncenter'>$nfe_model_formatted</td>
          <td class='txtalgncenter'>$nfe_id</th>
          <td class='txtalgncenter'>$nfe_nv</th>
          <td class='txtalgncenter'>$nfe_nf</th>
          <td class='txtalgncenter'>$nfe_todo_formatted</th>
          <td><a onclick='nfeOverview(`$nfe_model`, `$m_entryid`, `$m_companyid`, `$m_companyname`, `$nfe_id`, `$nfe_nv`, `$nfe_nf`, `$m_status`, `$m_addedby`, `$m_entrydate`, `$nfe_todo`, `$m_problem`); addModal(`nfe_overview_modal`);'>" . ucfirst($m_problemFormatted) . "</a></td>";

          if ($m_status == 20){
            echo "<td>
              <button class='button is-small is-danger' disabled>
                <span class='icon is-small'>
                  <i class='fas fa-times'></i>
                </span>
              </button></a>
            </td>";
          } else {
            echo "<td>
              <button id='bclmodal$m_entryid' onclick='changeModalCloseNumber(`./src/post/mp_closeentry.php?isNfe&id=`, $m_entryid); addModal(`clmodal`);' class='button is-small is-danger'>
                <span class='icon is-small'>
                  <i class='fas fa-times'></i>
                </span>
              </button></a>
            </td>";
          }

  echo   "<td>
            <button id='ednfemodal$m_entryid' onclick='changeManagerModalEditNfe(`$m_entryid`, `$m_companyid`, `$m_companyname`, `$m_status`, `$nfe_model`, `$nfe_todo`, `$nfe_id`, `$nfe_nv`, `$nfe_nf`, `$m_problem`); addModal(`modal_edit_nfe`);' class='button is-small is-warning'>
              <span class='icon is-small'>
                <i class='fas fa-pen'></i>
              </span>
            </button></a>
          </td>
        </tr>";
}

echo "</tbody></table>
  </section>
  <section class='cSpaceSmall'>
    <section>
      <div class='manager_explanation'>";

      include_once './src/bit/manager/bit/manager_main_exp.php';

      echo "</div>
      <div class='manager_pagination'>";

      include_once './src/bit/core/core_pagination_nfe.php';

      echo "</div>
    </section>
  </section>";
?>
