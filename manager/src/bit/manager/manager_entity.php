<?php
    echo "<table class='table is-bordered is-fullwidth'>
      <thead>
        <tr>
          <th class='mopt-status'></th>
          <th class='mopt-box'>ID</th>
          <th class='company-name'>Empresa</th>
          <th class='entity-phone'>Phone</th>
          <th class='entity-email'>Email</th>
          <th class='entity-email'>Accountant Email</th>
          <th class='mopt-box'></th>
        </tr>
      </thead>
      <tbody>";

if (is_NULL($page)){ $page = 1; }
if ($page == 1){ $sqlpagination = 0; } else { $sqlpagination = $maxperpage*($page-1); }

if (is_NULL($filter)){
  $data = $db->query("SELECT *
                      FROM man_entity AS m
                      JOIN man_cep AS c
                      ON m.city = c.cityid
                      ORDER BY isActive DESC,companyName ASC
                      LIMIT $sqlpagination, $maxperpage");
} else {
  $data = $db->prepare("SELECT *
                        FROM man_entity AS m
                        JOIN man_cep AS c
                        ON m.city = c.cityid
                        WHERE isActive=?
                        ORDER BY isActive DESC, companyName ASC
                        LIMIT $sqlpagination, $maxperpage");

  $entityFilter = substr($filter, 1, 2);
  $data->execute([$entityFilter]);
}


while ($row = $data->fetch()) {
  $m_companyid = $row["companyid"];
  $m_companyname = utf8_encode($row["companyName"]);
  $e_phone = $row["phone"];
  $e_phoneS = $row["phoneSec"];
  $e_emailprimary = utf8_encode($row["emailPrimary"]);
  $e_emailaccountant = utf8_encode($row["emailAccountant"]);
  $e_isactive = $row["isActive"];
  $e_city = utf8_encode($row["cityName"]);
  $e_cityid = utf8_encode($row["cityid"]);
  $ent_addedby = $row["addedBy"];
  $ent_dateAdded = $row["dateAdded"];
  $ent_remote = $row["remoteLink"];


  echo "<tr class='trline$e_isactive'>
          <td class='trstatus$e_isactive'></td>
          <td class='txtalgncenter'>$m_companyid</td>
          <td><a onclick='entityOverview(`$m_companyid`, `$m_companyname`, `$e_phone`, `$e_phoneS`, `$e_emailprimary`, `$e_emailaccountant`, `$e_isactive`, `$ent_addedby`, `$e_city`, `$ent_dateAdded`, `$ent_remote`); addModal(`ent_overview_modal`);'>" . ucfirst($m_companyname) . "</a></td>
          <td class='txtalgncenter'>" . formatPhone($e_phone) . "</td>
          <td>" . formatEmail($e_emailprimary) . "</td>
          <td>" . formatEmail($e_emailaccountant) . "</td>
          <td class='txtalgncenter'>
            <button onclick='editEntity(`$m_companyid`, `$m_companyname`, `$e_isactive`, `$e_cityid`, `$e_phone`, `$e_phoneS`, `$e_emailprimary`, `$e_emailaccountant`); addModal(`modal_edit_entity`);' class='button is-small is-warning tooltip is-tooltip-right is-tooltip-warning' data-tooltip='Editar entidade'>
              <span class='icon is-small'>
                <i class='fas fa-pen'></i>
              </span>
            </button>
          </td>
        </tr>";
}

  echo "</tbody></table>
    </section>
    <section class='cSpaceSmall'>
      <section>
        <div class='manager_explanation'>";

        include_once './src/bit/manager/bit/manager_entity_exp.php';

        echo "</div>
        <div class='manager_pagination'>";

        include_once './src/bit/core/core_pagination_entity.php';

        echo "</div>
      </section>
    </section>";
?>
