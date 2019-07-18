<?php

    include_once './src/bit/manager_options.php';
    include_once './src/bit/format_pattern.php';
    include_once './src/bit/m_addentry.php';

    $sql = "SELECT * FROM entity ORDER BY isActive DESC, companyName ASC LIMIT 50";

    if ($results = $conn->query($sql)){

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

      while ($row = $results->fetch_assoc()){
        $a = $row["companyid"];
        $b = utf8_encode($row["companyName"]);
        $c = $row["phone"];
        $d = utf8_encode($row["emailPrimary"]);
        $ds = utf8_encode($row["emailAccountant"]);
        $e = $row["isActive"];

        if (is_NULL($filter)){
          if ($e == 1){
              echo "<tr>
                      <td class='trstatus$e'></td>
                      <td class='txtalgncenter'>$a</td>
                      <td><a href='./profile.php?id=$a'>" . ucfirst($b) . "</a></td>
                      <td class='txtalgncenter'>" . formatPhone($c) . "</td>
                      <td>" . formatEmail($d) . "</td>
                      <td>" . formatEmail($ds) . "</td>
                      <td><a href='./profile_edit.php?id=$a'><img src='./src/images/edit.png' /></a></td>
                    </tr>";
            } elseif ($e == 0) {
              echo "<tr>
                      <td class='trstatus$e'></td>
                      <td class='txtalgncenter'>$a</td>
                      <td><a href='./profile.php?id=$a'>" . ucfirst($b) . "</a></td>
                      <td class='txtalgncenter'>" . formatPhone($c) . "</td>
                      <td>" . formatEmail($d) . "</td>
                      <td>" . formatEmail($ds) . "</td>
                      <td><a href='./profile_edit.php?id=$a'><img src='./src/images/edit.png' /></a></td>
                    </tr>";
            } } elseif (is_numeric($filter) & $filter == 30){ // 0 - closed
          if ($e == 0){
            echo "<tr>
                    <td class='trstatus$e'></td>
                    <td class='txtalgncenter'>$a</td>
                    <td><a href='./profile.php?id=$a'>" . ucfirst($b) . "</a></td>
                    <td class='txtalgncenter'>" . formatPhone($c) . "</td>
                    <td>" . formatEmail($d) . "</td>
                    <td>" . formatEmail($ds) . "</td>
                    <td><a href='./profile_edit.php?id=$a'><img src='./src/images/edit.png' /></a></td>
                  </tr>";
          } } elseif ($filter == 31){ // 1 - open
          if ($e == 1){
            echo "<tr>
                    <td class='trstatus$e'></td>
                    <td class='txtalgncenter'>$a</td>
                    <td><a href='./profile.php?id=$a'>" . ucfirst($b) . "</a></td>
                    <td class='txtalgncenter'>" . formatPhone($c) . "</td>
                    <td>" . formatEmail($d) . "</td>
                    <td>" . formatEmail($ds) . "</td>
                    <td><a href='./profile_edit.php?id=$a'><img src='./src/images/edit.png' /></a></td>
                  </tr>";
          } } }
          echo "</tbody></table>
      </section>
      <section class='cSpaceSmall'>
        <section>
          <div class='manager-explanation'>";

          include_once './src/bit/managerentity_exp.php';

          echo "</div>
        </section>
      </section>";
    }
?>
