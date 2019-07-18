<?php

    include_once './src/bit/manager_options.php';

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

if (is_NULL($filter)){
  $data = $db->query("SELECT * FROM manager AS m JOIN entity AS e ON m.companyid = e.companyid WHERE status IN (0,1,2) ORDER BY status DESC, entryDate ASC LIMIT 50");
} else {
  $data = $db->prepare("SELECT * FROM manager AS m JOIN entity AS e ON m.companyid = e.companyid WHERE status IN (?) ORDER BY status DESC, entryDate ASC LIMIT 50");
  $data->execute([$filter]);
}


while ($row = $data->fetch()) {
  $m_entryid = $row["entryid"]; // a
  $m_companyid = $row["companyid"]; // b
  $m_companyname = utf8_encode($row["companyName"]); // ba
  $m_problem = ucfirst(utf8_encode($row["problem"])); // c
  // ca = $m_problem_formatted
  $m_status = $row["status"]; // d
  $m_entrydate = $row["entryDate"]; // e

  if (strlen($m_companyname) >= 20){ $m_companyname = substr($row["companyName"], 0, 20); $m_companyname .= '...'; }
  if (strlen($m_problem) >= 100){ $m_problem_formatted = substr(ucfirst(utf8_encode($row["problem"])), 0, 100); $m_problem_formatted .= '...'; } else { $m_problem_formatted = ucfirst(utf8_encode($row["problem"])); }
  if (strlen($m_entrydate) >= 11){ $m_entrydate = substr($row["entryDate"], 0, 10); }

  echo "<tr>
          <td class='trstatus$m_status'>&nbsp;</td>
          <td><a href='./profile.php?id=$m_companyid'>" . ucfirst($m_companyname) . "</a></td>
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
            echo "<button id='bclmodal$m_status' onclick='changeModalCloseNumber(`./src/post/mp_closeentry.php?id=`, $m_entryid); addModal(`bclmodal$m_status`, `clmodal`);' class='button is-small is-danger'>
              <span class='icon is-small'>
                <i class='fas fa-times'></i>
              </span>
            </button></a>
          </td>";
          }

  echo   "<td>
            <button id='bedmodal$m_entryid' onclick='changeManagerModalEdit(`$m_entryid`, `$m_companyname`, `$m_entrydate`, `$m_problem`, `$m_status`); addModal(`bedmodal$m_entryid`, `edmodal`);' class='button is-small is-warning'>
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
      <div class='manager-explanation'>";

      include_once './src/bit/manager_exp.php';

      echo "</div>
    </section>
  </section>";
?>
