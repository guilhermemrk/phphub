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
      $data = $db->query("SELECT *
                          FROM man_manager AS m
                          JOIN man_entity AS e
                          ON m.companyid = e.companyid
                          JOIN man_cep AS c
                          ON e.city = c.cityid
                          WHERE m.status IN (0,1,2)
                          ORDER BY m.status DESC, m.entryDate DESC
                          LIMIT $sqlpagination, $maxperpage");
    } else {
      $data = $db->query("SELECT *
                          FROM man_manager AS m
                          JOIN man_entity AS e
                          ON m.companyid = e.companyid
                          JOIN man_cep AS c
                          ON e.city = c.cityid
                          WHERE m.status IN ($filter)
                          ORDER BY m.status DESC, m.entryDate DESC
                          LIMIT $sqlpagination, $maxperpage");
    }


while ($row = $data->fetch()) {
  $m_entryid = $row["entryid"]; // a
  $m_companyid = $row["companyid"]; // b
  $m_companyname = utf8_encode($row["companyName"]); // ba
  $m_problem = ucfirst(utf8_encode($row["problem"])); // c
  // ca = $m_problem_formatted
  $m_status = $row["status"]; // d
  $m_entrydate = $row["entryDate"]; // e
  $ent_phone = $row["phone"];
  $ent_phoneSec = $row["phoneSec"];
  $ent_email = $row["emailPrimary"];
  $ent_emaila = $row["emailAccountant"];
  $ent_active = $row["isActive"];
  $ent_addedby = $row["addedBy"];
  $ent_city = $row["cityName"];
  $ent_dateAdded = $row["dateAdded"];
  $ent_remoteLink = $row["remoteLink"];

  if (strlen($m_companyname) >= 20){ $m_companyname = substr($row["companyName"], 0, 20); $m_companyname .= '...'; }
  if (strlen($m_problem) >= 100){ $m_problem_formatted = substr(ucfirst(utf8_encode($row["problem"])), 0, 100); $m_problem_formatted .= '...'; } else { $m_problem_formatted = ucfirst(utf8_encode($row["problem"])); }
  if (strlen($m_entrydate) >= 11){ $m_entrydate = substr($row["entryDate"], 0, 10); }

  echo "<tr class='trline$m_status'>
          <td class='trstatus$m_status'>&nbsp;</td>
          <td><a id='ent_overview_modal$m_companyid' onclick='entityOverview(`$m_companyid`, `" . utf8_encode($m_companyname) . "`, `$ent_phone`, `$ent_phoneSec`, `$ent_email`, `$ent_emaila`, `$ent_active`, `$ent_addedby`, `" . utf8_encode($ent_city) . "`, `$ent_dateAdded`, `$ent_remoteLink`); addModal(`ent_overview_modal`);'>" . ucfirst($m_companyname) . "</a></td>
          <td class='txtalgncenter'>$m_entrydate</td>
          <td><a href='./problem.php?id=$m_entryid'>$m_problem_formatted</a></td>
          <td>";

          if ($m_status == 0){
            echo "<button class='button is-small is-danger' disabled>
              <span class='icon is-small'>
                <i class='fas fa-times'></i>
              </span>
            </button></a>
          </td>";
          } else {
            echo "<button id='bclmodal$m_entryid' onclick='changeModalCloseNumber(`./src/post/mp_closeentry.php?id=`, `$m_entryid`); addModal(`clmodal`);' class='button is-small is-danger'>
              <span class='icon is-small'>
                <i class='fas fa-times'></i>
              </span>
            </button></a>
          </td>";
          }

  echo   "<td>
            <button id='bedmodal$m_entryid' onclick='changeManagerModalEdit(`$m_entryid`, `$m_companyid`, `$m_companyname`, `$m_entrydate`, `$m_problem`, `$m_status`); addModal(`edmodal`);' class='button is-small is-warning'>
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
