<?php
echo <<<HTML
    <table class='table is-bordered is-fullwidth'>
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
    $m_companyname = utf8_encode($row["companyName"]);
    $m_problem = ucfirst(utf8_encode($row["problem"]));
    $m_solution_encoded = utf8_encode($row["solution"]);
    if (strlen($m_companyname) >= 20) {
        $m_companyname = substr($row["companyName"], 0, 20);
        $m_companyname.= '...';
    }
    if (strlen($row["entryDate"]) >= 11) {
        $m_entrydateFormatted = substr($row["entryDate"], 0, 10);
    } else {
        $m_entrydateFormatted = $row["entryDate"];
    }
    if ($row["category"] == 1) {
        $categorytag = "<span class='tag is-link'>$row[categoryName]</span>";
    } else if ($row["category"] == 2) {
        $categorytag = "<span class='tag is-danger'>$row[categoryName]</span>";
    } else {
        $categorytag = '';
    }
    echo "<tr class='trline$row[status]'>
          <td class='trstatus$row[status]'>&nbsp;</td>
          <td><a onclick='entityOverview(`$row[companyid]`, `$m_companyname`, `$row[phone]`, `$row[phoneSec]`, `$row[emailPrimary]`, `$row[emailAccountant]`, `$row[isActive]`, `$row[addedBy]`, `" . utf8_encode($row["cityName"]) . "`, `$row[dateAdded]`, `$row[remoteLink]`); addModal(`ent_overview_modal`);'>" . ucfirst($m_companyname) . "</a></td>
          <td class='txtalgncenter'>$m_entrydateFormatted</td>
          <td><a onclick='entryOverview(`$row[entryid]`, `$row[companyid]`, `$m_companyname`, `$row[status]`, `$row[m_addedby]`, `$row[entryDate]`, `$m_problem`, `$m_solution_encoded`); addModal(`entry_overview_modal`);'><div class='man_main_divproblem'>" . formatProblem($row["problem"], '/(.{90})(.*)/', 90) . "</div><div class='man_main_divptag'>$categorytag</div></a></td>
          <td class='txtalgncenter'>";
    if ($row["status"] == 0) {
        echo <<<HTML
            <button class='button is-small is-danger' disabled>
              <span class='icon is-small'>
                <i class='fas fa-times'></i>
              </span>
            </button></a>
          </td>
HTML;

    } else {
        echo <<<HTML
            <button onclick='changeModalCloseNumber(`./src/post/mp_closeentry.php?id=`,`$row[entryid]`); addModal(`clmodal`);' class='button is-small is-danger tooltip is-tooltip-left is-tooltip-danger' data-tooltip='Finalizar occorência'>
              <span class='icon is-small'>
                <i class='fas fa-times'></i>
              </span>
            </button></a>
          </td>
HTML;

    }
    echo <<<HTML
  <td class='txtalgncenter'>
            <button onclick='changeManagerModalEdit(`$row[entryid]`, `$row[companyid]`, `$m_companyname`, `$row[entryDate]`, `$m_problem`, `$row[status]`, `$m_solution_encoded`, `$row[category]`); addModal(`edmodal`);' class='button is-small is-warning tooltip is-tooltip-left is-tooltip-warning' data-tooltip='Editar occorrência'>
              <span class='icon is-small'>
                <i class='fas fa-pen'></i>
              </span>
            </button></a>
          </td>
        </tr>
HTML;

}
echo <<<HTML
</tbody></table>
  </section>
  <section class='cSpaceSmall'>
    <section>
      <div class='manager_explanation'>
HTML;
include_once './src/bit/manager/bit/manager_main_exp.php';
echo <<<HTML
    </div>
      <div class='manager_pagination'>
HTML;
include_once './src/bit/core/core_pagination.php';
echo <<<HTML
    </div>
    </section>
  </section>
HTML;

?>
