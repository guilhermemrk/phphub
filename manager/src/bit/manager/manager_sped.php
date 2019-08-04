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
          <th class='entity-email'>Situação</th>
          <th class='entity-phone'>Phone</th>
          <th class='entity-email'>Accountant Email</th>
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
// sped_status: 0 -> Finalizada / 1-> Pendente / 2 ->  Em progresso. / 3 -> Erro / 4 -> Urgente / 5 -> Urgente, dando erro
if (is_NULL($filter)) {
    $data = $db->query("SELECT *
                      FROM man_entity AS m
                      JOIN man_cep AS c
                      ON m.city = c.cityid
                      WHERE m.sped=1 AND entgroup=$sUsergroup
                      ORDER BY m.sped_status DESC, m.companyName ASC
                      LIMIT $sqlpagination, $maxperpage");
} else {
    $data = $db->prepare("SELECT *
                        FROM man_entity AS m
                        JOIN man_cep AS c
                        ON m.city = c.cityid
                        WHERE m.sped=1 AND m.sped_status=? AND entgroup=$sUsergroup
                        ORDER BY m.sped_status DESC, m.companyName ASC
                        LIMIT $sqlpagination, $maxperpage");
    $data->execute([$filter]);
}
while ($row = $data->fetch()) {
    $m_companyname = ucfirst(utf8_encode($row["companyName"]));
    $e_city = utf8_encode($row["cityName"]);
    if ($row["sped_status"] == 0) {
        $sped_statusFormatted = 'Enviado';
    } else if ($row["sped_status"] == 1) {
        $sped_statusFormatted = 'Pendente';
    } else if ($row["sped_status"] == 2) {
        $sped_statusFormatted = 'Em progresso';
    } else if ($row["sped_status"] == 3) {
        $sped_statusFormatted = 'Erro';
    } else if ($row["sped_status"] == 4) {
        $sped_statusFormatted = 'Urgente';
    } else if ($row["sped_status"] == 5) {
        $sped_statusFormatted = 'Urgente & Erro';
    }
    if (is_NULL($row["emailAccountant"]) || empty($row["emailAccountant"])) {
        $e_emailfield = $row["emailPrimary"];
    } else {
        $e_emailfield = $row["emailAccountant"];
    }
    echo <<<HTML
  <tr class='trline$row[isActive]'>
  <td class='trstsped$row[sped_status]'></td>
  <td class='txtalgncenter'>$row[companyid]</td>
  <td><a onclick='entityOverview(`$row[companyid]`, `$m_companyname`, `$row[phone]`, `$row[phoneSec]`, `$row[emailPrimary]`, `$row[emailAccountant]`, `$row[isActive]`, `$row[addedBy]`, `$e_city`, `$row[dateAdded]`, `$row[remoteLink]`); addModal(`ent_overview_modal`);'>$m_companyname</a></td>
HTML;
    if (!is_NULL($row["sped_user"]) && $row["sped_status"] != 1) {
        echo "<td><div class='statusfirstdiv'>$sped_statusFormatted</div><div class='statusseconddiv'><span class='tag is-link'>$row[sped_user]</span></div></td>";
    } else {
        echo "<td>$sped_statusFormatted</td>";
    }
    echo "<td class='txtalgncenter'>" . formatPhone($row["phone"]) . "</td>
          <td>" . formatEmail($e_emailfield) . "</td>
          ";
    if ($row["sped_status"] != 0) {
        echo <<<HTML
        <td class='txtalgncenter'>
              <button class='button is-small is-primary tooltip is-tooltip-left is-tooltip-primary' data-tooltip='Finalizar SPED' onclick='closeSped(`./src/post/mp_closesped.php?id=`, `$row[companyid]`, `$m_companyname`); addModal(`modal_spedclose`)'>
                <span class='icon is-small'>
                  <i class='fas fa-check'></i>
                </span>
              </button>
            </td>
HTML;

    } else {
        echo <<<HTML
        <td class='txtalgncenter'>
              <button class='button is-small is-primary' disabled>
                <span class='icon is-small'>
                  <i class='fas fa-check'></i>
                </span>
              </button>
            </td>
HTML;

    }
    echo <<<HTML
    <td class='txtalgncenter'>
            <button class='button is-small is-warning tooltip is-tooltip-left is-tooltip-warning' data-tooltip='Editar situação' onclick='editSped(`./src/post/mp_editsped.php?id=`, `$row[companyid]`, `$m_companyname`, `$row[sped_status]`); addModal(`modal_spededit`);'>
              <span class='icon is-small'>
                <i class='fas fa-pen'></i>
              </span>
            </button>
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
include_once './src/bit/manager/bit/manager_sped_exp.php';
echo <<<HTML
</div>
        <div class='manager_pagination'>
HTML;
include_once './src/bit/core/core_pagination_sped.php';
echo <<<HTML
</div>
      </section>
    </section>
HTML;

?>
