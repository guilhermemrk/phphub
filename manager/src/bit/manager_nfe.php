<?php

    include_once './src/bit/manager_options.php';

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

if (is_NULL($filter)){
  $data = $db->query("SELECT * FROM manager AS m JOIN entity AS e ON m.companyid = e.companyid WHERE status IN (20,21,22) ORDER BY status DESC, entryDate ASC LIMIT 50");
} else {
  $data = $db->prepare("SELECT * FROM manager AS m JOIN entity AS e ON m.companyid = e.companyid WHERE status IN (?) ORDER BY status DESC, entryDate ASC LIMIT 50");
  $data->execute([$filter]);
}


while ($row = $data->fetch()) {
  $m_entryid = $row["entryid"]; // a
  $m_companyid = $row["companyid"]; // b
  $m_companyname = utf8_encode($row["companyName"]); // ba
  $nfe_model = utf8_encode($row["nfe_modelo"]); // c && ca = $nfe_model_formatted
  $nfe_id = utf8_encode($row["nfe_id"]); // d
  $nfe_nv = utf8_encode($row["nfe_nv"]); // e
  $nfe_nf = utf8_encode($row["nfe_nf"]); // f
  $m_entrydate = $row["entryDate"]; // g
  $m_problem = ucfirst(utf8_encode($row["problem"])); // h
  $m_status = $row["status"]; // i
  $m_status_formatted = substr($row["status"], 1, 2); // ia
  $nfe_todo = utf8_encode($row["nfe_todo"]); // j && ja = $nfe_todo_formatted


  if ($nfe_model == '55'){ $nfe_model_formatted = 'NFe'; } elseif ($nfe_model == '65'){ $nfe_model_formatted = 'NFCe'; }
  if (is_numeric($nfe_todo) && $nfe_todo == 0){ $nfe_todo_formatted = 'Cancelar'; } elseif ($nfe_todo == 1){ $nfe_todo_formatted = 'Autorizar'; } elseif ($nfe_todo == 2){ $nfe_todo_formatted = 'Inutilizar'; } elseif ($nfe_todo == 3){ $nfe_todo_formatted = 'Outro'; }
  if (strlen($m_problem) >= 30){ $m_problem = substr($row["problem"], 0, 30); $m_problem .= '...'; }
  if (strlen($m_companyname) >= 20){ $m_companyname = substr($row["companyName"], 0, 20); $m_companyname .= '...';}
  if (strlen($m_entrydate) >= 11){ $m_entrydate = substr($row["entryDate"], 0, 10); }

  echo "<tr>
          <td class='trstatus$m_status_formatted'>&nbsp;</td>
          <td><a href='./profile.php?id=$m_companyid'>" . ucfirst($m_companyname) . "</a></td>
          <td class='txtalgncenter'>$m_entrydate</td>
          <td class='txtalgncenter'>$nfe_model_formatted</td>
          <td class='txtalgncenter'>$nfe_id</th>
          <td class='txtalgncenter'>$nfe_nv</th>
          <td class='txtalgncenter'>$nfe_nf</th>
          <td class='txtalgncenter'>$nfe_todo_formatted</th>
          <td><a href='./problem.php?id=$m_entryid'>" . ucfirst($m_problem) . "</a></td>";

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
              <button id='bclmodal-$m_entryid' onclick='changeModalCloseNumber(`./src/post/mp_closeentry.php?isNfe&id=`, $m_entryid); addModal(`bclmodal-$m_entryid`, `clmodal`);' class='button is-small is-danger'>
                <span class='icon is-small'>
                  <i class='fas fa-times'></i>
                </span>
              </button></a>
            </td>";
          }

  echo   "<td>
            <button class='button is-small is-warning' disabled>
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
