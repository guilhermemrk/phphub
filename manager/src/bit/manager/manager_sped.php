<?php
    echo "<table class='table is-bordered is-fullwidth'>
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
      <tbody>";

if (is_NULL($page)){ $page = 1; }
if ($page == 1){ $sqlpagination = 0; } else { $sqlpagination = $maxperpage*($page-1); }
// sped_status: 0 -> Finalizada / 1-> Pendente / 2 ->  Em progresso. / 3 -> Erro / 4 -> Urgente / 5 -> Urgente, dando erro
if (is_NULL($filter)){
  $data = $db->query("SELECT *
                      FROM man_entity AS m
                      JOIN man_cep AS c
                      ON m.city = c.cityid
                      WHERE m.sped=1
                      ORDER BY m.sped_status DESC, m.companyName ASC
                      LIMIT $sqlpagination, $maxperpage");
} else {
  $data = $db->prepare("SELECT *
                        FROM man_entity AS m
                        JOIN man_cep AS c
                        ON m.city = c.cityid
                        WHERE m.sped=1 AND m.sped_status=?
                        ORDER BY m.sped_status DESC, m.companyName ASC
                        LIMIT $sqlpagination, $maxperpage");
  $data->execute([$filter]);
}


while ($row = $data->fetch()) {
  $m_companyid = $row["companyid"];
  $m_companyname = utf8_encode($row["companyName"]);
  $e_phone = $row["phone"];
  $e_phoneS = $row["phoneSec"];
  $e_emailprimary = utf8_encode($row["emailPrimary"]);
  $e_emailaccountant = utf8_encode($row["emailAccountant"]);
  $e_isactive = $row["isActive"];
  $sped_status = $row["sped_status"];
  $e_city = utf8_encode($row["cityName"]);
  $e_cityid = utf8_encode($row["cityid"]);
  $ent_addedby = $row["addedBy"];
  $ent_dateAdded = $row["dateAdded"];
  $ent_remote = $row["remoteLink"];
  $sped = $row["sped"];
  $sped_status = $row["sped_status"];
  $sped_user = $row["sped_user"];

  if ($sped_status == 0){ $sped_statusFormatted = 'Enviado'; }
  else if ($sped_status == 1){ $sped_statusFormatted = 'Pendente'; }
  else if ($sped_status == 2){ $sped_statusFormatted = 'Em progresso'; }
  else if ($sped_status == 3){ $sped_statusFormatted = 'Erro'; }
  else if ($sped_status == 4){ $sped_statusFormatted = 'Urgente'; }
  else if ($sped_status == 5){ $sped_statusFormatted = 'Urgente & Erro'; }

  if (is_NULL($e_emailaccountant) || empty($e_emailaccountant)){ $e_emailfield = $e_emailprimary; } else { $e_emailfield = $e_emailaccountant; }


  echo "<tr class='trline$e_isactive'>
          <td class='trstsped$sped_status'></td>
          <td class='txtalgncenter'>$m_companyid</td>
          <td><a onclick='entityOverview(`$m_companyid`, `$m_companyname`, `$e_phone`, `$e_phoneS`, `$e_emailprimary`, `$e_emailaccountant`, `$e_isactive`, `$ent_addedby`, `$e_city`, `$ent_dateAdded`, `$ent_remote`); addModal(`ent_overview_modal`);'>" . ucfirst($m_companyname) . "</a></td>
          ";
          if (!is_NULL($sped_user) && $sped_status != 1){
            echo "<td><div class='statusfirstdiv'>$sped_statusFormatted</div><div class='statusseconddiv'><span class='tag is-link'>$sped_user</span></div></td>";
          } else {
            echo "<td>$sped_statusFormatted</td>";
          }
          echo "<td class='txtalgncenter'>" . formatPhone($e_phone) . "</td>
          <td>" . formatEmail($e_emailfield) . "</td>
          ";
          if ($sped_status != 0){
            echo "<td class='txtalgncenter'>
              <button class='button is-small is-primary tooltip is-tooltip-left is-tooltip-primary' data-tooltip='Finalizar SPED' onclick='closeSped(`./src/post/mp_closesped.php?id=`, `$m_companyid`, `$m_companyname`); addModal(`modal_spedclose`)'>
                <span class='icon is-small'>
                  <i class='fas fa-check'></i>
                </span>
              </button>
            </td>";
          } else {
            echo "<td class='txtalgncenter'>
              <button class='button is-small is-primary' disabled>
                <span class='icon is-small'>
                  <i class='fas fa-check'></i>
                </span>
              </button>
            </td>";
          }

          echo "<td class='txtalgncenter'>
            <button class='button is-small is-warning tooltip is-tooltip-left is-tooltip-warning' data-tooltip='Editar situação' onclick='editSped(`./src/post/mp_editsped.php?id=`, `$m_companyid`, `$m_companyname`, `$sped_status`); addModal(`modal_spededit`);'>
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

        include_once './src/bit/manager/bit/manager_sped_exp.php';

        echo "</div>
        <div class='manager_pagination'>";

        include_once './src/bit/core/core_pagination_sped.php';

        echo "</div>
      </section>
    </section>";
?>
