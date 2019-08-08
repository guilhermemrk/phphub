<?php
echo <<<HTML
    <table class='table is-bordered is-fullwidth'>
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
if (is_NULL($filter) && is_NULL($fcompany)) {
    $data = $db->query("SELECT m.addedBy AS m_addedby, m.*, e.*, c.*
                          FROM man_manager AS m
                          JOIN man_entity AS e
                          ON m.companyid = e.companyid
                          JOIN man_cep AS c
                          ON e.city = c.cityid
                          WHERE m.status IN (20,21,22) AND m.addedBy IN ('$sUsername')
                          ORDER BY m.status DESC, m.entryDate DESC
                          LIMIT $sqlpagination, $maxperpage");
} else if (!is_NULL($filter)) {
    $data = $db->query("SELECT m.addedBy AS m_addedby, m.*, e.*, c.*
                          FROM man_manager AS m
                          JOIN man_entity AS e
                          ON m.companyid = e.companyid
                          JOIN man_cep AS c
                          ON e.city = c.cityid
                          WHERE m.status IN ($filter) AND m.addedBy IN ('$sUsername')
                          ORDER BY m.status DESC, m.entryDate DESC
                          LIMIT $sqlpagination, $maxperpage");
} elseif (!is_NULL($fcompany)) {
    $data = $db->query("SELECT m.addedBy AS m_addedby, m.*, e.*, c.*
                          FROM man_manager AS m
                          JOIN man_entity AS e
                          ON m.companyid = e.companyid
                          JOIN man_cep AS c
                          ON e.city = c.cityid
                          WHERE m.status IN (20,21,22) AND m.addedBy IN ('$sUsername') AND m.companyid IN ($fcompany)
                          ORDER BY m.status DESC, m.entryDate DESC
                          LIMIT $sqlpagination, $maxperpage");
} elseif (!is_NULL($filter) && !is_NULL($fcompany)) {
    $data = $db->query("SELECT m.addedBy AS m_addedby, m.*, e.*, c.*
                          FROM man_manager AS m
                          JOIN man_entity AS e
                          ON m.companyid = e.companyid
                          JOIN man_cep AS c
                          ON e.city = c.cityid
                          WHERE m.status IN ($filter) AND m.addedBy IN ('$sUsername') AND m.companyid IN ($fcompany)
                          ORDER BY m.status DESC, m.entryDate DESC
                          LIMIT $sqlpagination, $maxperpage");
}

while ($row = $data->fetch()) {
    $m_companyname = utf8_encode($row["companyName"]);
    $m_problem = ucfirst(utf8_encode($row["problem"]));
    $ent_city = utf8_encode($row["cityName"]);
    $m_solution_encoded = utf8_encode($row["solution"]);
    $m_status_formatted = substr($row["status"], 1, 2);
    if ($row["nfe_modelo"] == '55') {
        $nfe_model_formatted = 'NFe';
    } elseif ($row["nfe_modelo"] == '65') {
        $nfe_model_formatted = 'NFCe';
    } elseif ($row["nfe_modelo"] == '99') {
        $nfe_model_formatted = 'Outro';
    }
    if (is_numeric($row["nfe_todo"]) && $row["nfe_todo"] == 0) {
        $nfe_todo_formatted = 'Cancelar';
    } elseif ($row["nfe_todo"] == 1) {
        $nfe_todo_formatted = 'Autorizar';
    } elseif ($row["nfe_todo"] == 2) {
        $nfe_todo_formatted = 'Inutilizar';
    } elseif ($row["nfe_todo"] == 3) {
        $nfe_todo_formatted = 'Outro';
    }
    if (strlen($m_companyname) >= 20) {
        $m_companyname = substr($row["companyName"], 0, 20);
        $m_companyname.= '...';
    }
    if (strlen($row["entryDate"]) >= 11) {
        $m_entrydateFormatted = substr($row["entryDate"], 0, 10);
    } else {
        $m_entrydateFormatted = $row["entryDate"];
    }
    if ($row["status"] != 20) {
        if ($row["nfe_modelo"] == 55) {
            $nfemodel_tag = "<span class='tag is-info'>$nfe_model_formatted</span>";
        } else if ($row["nfe_modelo"] == 65) {
            $nfemodel_tag = "<span class='tag is-warning'>$nfe_model_formatted</span>";
        } else if ($row["nfe_modelo"] == 99) {
            $nfemodel_tag = "<span class='tag is-light'>$nfe_model_formatted</span>";
        }
    } else {
        $nfemodel_tag = "<span class='tag is-dark'>$nfe_model_formatted</span>";
    }
    echo "<tr class='trline$m_status_formatted'>
          <td class='trstatus$m_status_formatted'>&nbsp;</td>
          <td><a onclick='entityOverview(`$row[companyid]`, `$m_companyname`, `$row[phone]`, `$row[phoneSec]`, `$row[emailPrimary]`, `$row[emailAccountant]`, `$row[isActive]`, `$row[addedBy]`, `$ent_city`, `$row[dateAdded]`, `$row[remoteLink]`); addModal(`ent_overview_modal`);'>" . ucfirst($m_companyname) . "</a></td>
          <td class='txtalgncenter'>$m_entrydateFormatted</td>
          <td class='txtalgncenter'>$nfemodel_tag</td>
          <td class='txtalgncenter'>$row[nfe_id]</th>
          <td class='txtalgncenter'>$row[nfe_nv]</th>
          <td class='txtalgncenter'>$row[nfe_nf]</th>
          <td class='txtalgncenter'>$nfe_todo_formatted</th>
          <td><a onclick='nfeOverview(`$row[nfe_modelo]`, `$row[entryid]`, `$row[companyid]`, `$m_companyname`, `$row[nfe_id]`, `$row[nfe_nv]`, `$row[nfe_nf]`, `$row[status]`, `$row[addedBy]`, `$row[entryDate]`, `$row[nfe_todo]`, `$m_problem`, `$m_solution_encoded`); addModal(`nfe_overview_modal`);'>" . formatProblem($row["problem"], '/(.{45})(.*)/', 45) . "</a></td>";
    if ($m_status == 20) {
        echo <<<HTML
            <td class='txtalgncenter'>
              <button class='button is-small is-danger' disabled>
                <span class='icon is-small'>
                  <i class='fas fa-times'></i>
                </span>
              </button></a>
            </td>
HTML;

    } else {
        echo <<<HTML
            <td class='txtalgncenter'>
              <button onclick='changeModalCloseNumber(`./src/post/mp_closeentry.php?isNfe&id=`, $row[entryid]); addModal(`clmodal`);' class='button is-small is-danger tooltip is-tooltip-left is-tooltip-danger' data-tooltip='Finalizar NFe/NFCe'>
                <span class='icon is-small'>
                  <i class='fas fa-times'></i>
                </span>
              </button></a>
            </td>
HTML;

    }
    echo <<<HTML
  <td class='txtalgncenter'>
            <button onclick='changeManagerModalEditNfe(`$row[entryid]`, `$row[companyid]`, `$m_companyname`, `$row[status]`, `$row[nfe_modelo]`, `$row[nfe_todo]`, `$row[nfe_id]`, `$row[nfe_nv]`, `$row[nfe_nf]`, `$m_problem`, `$row[solution]`); addModal(`modal_edit_nfe`);' class='button is-small is-warning tooltip is-tooltip-left is-tooltip-warning' data-tooltip='Editar NFe/NFCe'>
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
include_once './src/bit/core/core_pagination_nfe.php';
echo <<<HTML
    </div>
    </section>
  </section>
HTML;

?>
