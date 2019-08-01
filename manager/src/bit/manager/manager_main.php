<?php
    echo "<table class='table is-bordered is-fullwidth'>
      <thead>
        <tr>
          <th class='mopt-status'></th>
          <th class='company-name'>Empresa</th>
          <th class='m-entrydate'>Data de Entrada</th>
          <th>Problema</th>
          <th class='mopt-box'></th>
          <th class='mopt-box'></th>
        </tr>
      </thead>
      <tbody>";

    if (is_NULL($page)){ $page = 1; }
    if ($page == 1){ $sqlpagination = 0; } else { $sqlpagination = $maxperpage*($page-1); }

    if (is_NULL($filter)){
      $data = $db->query("SELECT m.addedBy AS m_addedby, m.*, e.*, c.*, mc.*
                          FROM man_manager AS m
                          JOIN man_entity AS e
                          ON m.companyid = e.companyid
                          JOIN man_cep AS c
                          ON e.city = c.cityid
                          JOIN man_managercategory AS mc
                          ON m.category = mc.categoryid
                          WHERE m.status IN (0,1,2) AND m.addedBy IN ('$sUsername')
                          ORDER BY m.status DESC, m.entryDate DESC
                          LIMIT $sqlpagination, $maxperpage");
    } else {
      $data = $db->query("SELECT m.addedBy AS m_addedby, m.*, e.*, c.*, mc.*
                          FROM man_manager AS m
                          JOIN man_entity AS e
                          ON m.companyid = e.companyid
                          JOIN man_cep AS c
                          ON e.city = c.cityid
                          JOIN man_managercategory AS mc
                          ON m.category = mc.categoryid
                          WHERE m.status IN ($filter) AND m.addedBy IN ('$sUsername')
                          ORDER BY m.status DESC, m.entryDate DESC
                          LIMIT $sqlpagination, $maxperpage");
    }

while ($row = $data->fetch()) {
  $m_entryid = $row["entryid"];
  $m_companyid = $row["companyid"];
  $m_companyname = utf8_encode($row["companyName"]);
  $m_problem = ucfirst(utf8_encode($row["problem"]));
  $m_status = $row["status"];
  $m_entrydate = $row["entryDate"];
  $m_addedby = $row["m_addedby"];
  $ent_phone = $row["phone"];
  $ent_phoneSec = $row["phoneSec"];
  $ent_email = $row["emailPrimary"];
  $ent_emaila = $row["emailAccountant"];
  $ent_active = $row["isActive"];
  $ent_addedby = $row["addedBy"];
  $ent_city = $row["cityName"];
  $ent_dateAdded = $row["dateAdded"];
  $ent_remoteLink = $row["remoteLink"];
  $m_solution = $row["solution"];
  $m_solution_encoded = utf8_encode($row["solution"]);
  $mc_categoryName = $row["categoryName"];
  $mc_categoryId = $row["category"];

  if (strlen($m_companyname) >= 20){
    $m_companyname = substr($row["companyName"], 0, 20);
    $m_companyname .= '...';
  }
  if (strlen($m_problem) >= 95){
    $m_problem_formatted = substr($m_problem, 0, 95);
    $m_problem_formatted .= '...';
  } elseif (is_NULL($m_problem) || strlen($m_problem) == 0){
    $m_problem_formatted = 'Não informado.';
  } else { $m_problem_formatted = $m_problem; }
  if (strlen($m_entrydate) >= 11){
    $m_entrydateFormatted = substr($row["entryDate"], 0, 10);
  } else { $m_entrydateFormatted = $m_entrydate; }
  if ($mc_categoryId == 1){
    $categorytag = "<span class='tag is-link'>$mc_categoryName</span>";
  } else if ($mc_categoryId == 2){
    $categorytag = "<span class='tag is-danger'>$mc_categoryName</span>";
  } else { $categorytag = ''; }

  echo "<tr class='trline$m_status'>
          <td class='trstatus$m_status'>&nbsp;</td>
          <td><a id='ent_overview_modal$m_companyid' onclick='entityOverview(`$m_companyid`, `$m_companyname`, `$ent_phone`, `$ent_phoneSec`, `$ent_email`, `$ent_emaila`, `$ent_active`, `$ent_addedby`, `" . utf8_encode($ent_city) . "`, `$ent_dateAdded`, `$ent_remoteLink`); addModal(`ent_overview_modal`);'>" . ucfirst($m_companyname) . "</a></td>
          <td class='txtalgncenter'>$m_entrydateFormatted</td>
          <td><a id='entry_overview_modal$m_companyid' onclick='entryOverview(`$m_entryid`, `$m_companyid`, `$m_companyname`, `$m_status`, `$m_addedby`, `$m_entrydate`, `$m_problem`, `$m_solution_encoded`); addModal(`entry_overview_modal`);'><div class='man_main_divproblem'>$m_problem_formatted</div><div class='man_main_divptag'>$categorytag</div></a></td>
          <td class='txtalgncenter'>";

          if ($m_status == 0){
            echo "<button class='button is-small is-danger' disabled>
              <span class='icon is-small'>
                <i class='fas fa-times'></i>
              </span>
            </button></a>
          </td>";
          } else {
            echo "<button id='bclmodal$m_entryid' onclick='changeModalCloseNumber(`./src/post/mp_closeentry.php?id=`,`$m_entryid`); addModal(`clmodal`);' class='button is-small is-danger tooltip is-tooltip-left is-tooltip-danger' data-tooltip='Finalizar occorência'>
              <span class='icon is-small'>
                <i class='fas fa-times'></i>
              </span>
            </button></a>
          </td>";
          }

  echo   "<td class='txtalgncenter'>
            <button id='bedmodal$m_entryid' onclick='changeManagerModalEdit(`$m_entryid`, `$m_companyid`, `$m_companyname`, `$m_entrydate`, `$m_problem`, `$m_status`, `$m_solution_encoded`); addModal(`edmodal`);' class='button is-small is-warning tooltip is-tooltip-left is-tooltip-warning' data-tooltip='Editar occorrência'>
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

      include_once './src/bit/core/core_pagination.php';

      echo "</div>
    </section>
  </section>";
?>
