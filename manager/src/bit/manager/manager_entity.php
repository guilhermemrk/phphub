<?php
session_start();
$sUsergroup = $_SESSION['login'][1];
echo <<<HTML
    <table class='table is-bordered is-fullwidth'>
      <thead>
        <tr>
          <th class='mopt-status'></th>
          <th class='mopt-box'>ID</th>
          <th class='company-name'>Empresa</th>
          <th class='entity-phone'>Telefone</th>
          <th class='entity-email'>Email</th>
          <th class='entity-email'>Contador</th>
          <th class='mopt-box'></th>
        </tr>
      </thead>
      <tbody>
HTML;
if (is_NULL($page)) {
    $page = 1;
}
if ($page == 1) {
    $sqlpagination = 0;
} else {
    $sqlpagination = $maxperpage * ($page - 1);
}
if (is_NULL($filter)) {
    $data = $db->query("SELECT *
                      FROM man_entity AS m
                      JOIN man_cep AS c
                      ON m.city = c.cityid
                      WHERE entgroup=$sUsergroup
                      ORDER BY isActive DESC, companyName ASC
                      LIMIT $sqlpagination, $maxperpage");
} else {
    $data = $db->prepare("SELECT *
                        FROM man_entity AS m
                        JOIN man_cep AS c
                        ON m.city = c.cityid
                        WHERE isActive=? AND entgroup=$sUsergroup
                        ORDER BY isActive DESC, companyName ASC
                        LIMIT $sqlpagination, $maxperpage");
    $entityFilter = substr($filter, 1, 2);
    $data->execute([$entityFilter]);
}
while ($row = $data->fetch()) {
    $m_companyname = utf8_encode($row["companyName"]);
    $e_city = utf8_encode($row["cityName"]);
    echo "<tr class='trline$row[isActive]'>
          <td class='trstatus$row[isActive]'></td>
          <td class='txtalgncenter'>$row[companyid]</td>
          <td><a onclick='entityOverview(`$row[companyid]`, `$m_companyname`, `$row[phone]`, `$row[phoneSec]`, `$row[emailPrimary]`, `$row[emailAccountant]`, `$row[isActive]`, `$row[addedBy]`, `$e_city`, `$row[dateAdded]`, `$row[remoteLink]`); addModal(`ent_overview_modal`);'>" . ucfirst($m_companyname) . "</a></td>
          <td class='txtalgncenter'>" . formatPhone($row["phone"]) . "</td>
          <td>" . formatEmail($row["emailPrimary"]) . "</td>
          <td>" . formatEmail($row["emailAccountant"]) . "</td>
          <td class='txtalgncenter'>
            <button onclick='editEntity(`$row[companyid]`, `$m_companyname`, `$row[isActive]`, `$row[cityid]`, `$row[phone]`, `$row[phoneSec]`, `$row[emailPrimary]`, `$row[emailAccountant]`, `$row[sped]`); addModal(`modal_edit_entity`);' class='button is-small is-warning tooltip is-tooltip-right is-tooltip-warning' data-tooltip='Editar entidade'>
              <span class='icon is-small'>
                <i class='fas fa-pen'></i>
              </span>
            </button>
          </td>
        </tr>";

}
echo <<<HTML
</tbody></table>
    </section>
    <section class='cSpaceSmall'>
      <section>
        <div class='manager_explanation'>
HTML;
include_once './src/bit/manager/bit/manager_entity_exp.php';
echo <<<HTML
      </div>
        <div class='manager_pagination'>
HTML;
include_once './src/bit/core/core_pagination_entity.php';
echo <<<HTML
      </div>
      </section>
    </section>
HTML;

?>
