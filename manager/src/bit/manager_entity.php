<?php

    include_once './src/bit/manager_options.php';
    include_once './src/bit/format_pattern.php';

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

if (is_NULL($filter)){
  $data = $db->query("SELECT * FROM entity ORDER BY isActive DESC, companyName ASC LIMIT 50");
} else {
  $data = $db->prepare("SELECT * FROM entity WHERE isActive=? ORDER BY isActive DESC, companyName ASC LIMIT 50");
  $entityFilter = substr($filter, 1, 2);
  $data->execute([$entityFilter]);
}


while ($row = $data->fetch()) {
  $m_companyid = $row["companyid"]; // a
  $m_companyname = utf8_encode($row["companyName"]); // b
  $e_phone = $row["phone"]; // c
  $e_emailprimary = utf8_encode($row["emailPrimary"]); // d
  $e_emailaccountant = utf8_encode($row["emailAccountant"]); // ds
  $e_isactive = $row["isActive"]; // e

  echo "<tr>
          <td class='trstatus$e_isactive'></td>
          <td class='txtalgncenter'>$m_companyid</td>
          <td><a href='./profile.php?id=$m_companyid'>" . ucfirst($m_companyname) . "</a></td>
          <td class='txtalgncenter'>" . formatPhone($e_phone) . "</td>
          <td>" . formatEmail($e_emailprimary) . "</td>
          <td>" . formatEmail($e_emailaccountant) . "</td>
          <td>
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
