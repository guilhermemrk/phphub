<?php

    include_once './src/bit/manager_options.php';
    include_once './src/bit/m_addentry.php';

    $sql = "SELECT * FROM manager AS m JOIN entity AS e ON m.companyid = e.companyid WHERE status IN (0,1,2) ORDER BY status DESC, entryDate ASC LIMIT 50";

    if ($results = $conn->query($sql)){

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

      while ($row = $results->fetch_assoc()){
        $a = $row["entryid"];
        $b = $row["companyid"];
        $ba = utf8_encode($row["companyName"]);
        $c = utf8_encode($row["problem"]);
        $d = $row["status"];
        $e = $row["entryDate"];

        include_once "./src/bit/m_closeentry.php";

        if (strlen($ba) >= 20){ $ba = substr($row["companyName"], 0, 20); $ba .= '...';}
        if (strlen($c) >= 100){ $c = substr($row["problem"], 0, 100); $c .= '...';}
        if (strlen($e) >= 11){ $e = substr($row["entryDate"], 0, 10); }

        if (is_NULL($filter)){
          if ($d == 1){
              echo "<tr>
                      <td class='tropen'>&nbsp;</td>
                      <td><a href='./profile.php?id=$b'>" . ucfirst($ba) . "</a></td>
                      <td class='txtalgncenter'>$e</td>
                      <td><a href='./problem.php?id=$a'>" . ucfirst(utf8_encode($c)) . "</a></td>
                      <td><a id='bclmodal-$a' onclick='changeModalCloseNumber(`./src/post/mp_closeentry.php?id=`, $a); addModal(`bclmodal-$a`, `clmodal`);'><img src='./src/images/delete.png' /></a></td>
                      <td><a href='./editentry.php?id={$a}'><img src='./src/images/edit.png' /></a></td>
                    </tr>";
            } elseif ($d == 2) {
              echo "<tr>
                      <td class='trurgent'>&nbsp;</td>
                      <td><a href='./profile.php?id=$b'>" . ucfirst($ba) . "</a></td>
                      <td class='txtalgncenter'>$e</td>
                      <td><a href='./problem.php?id=$a'>" . ucfirst(utf8_encode($c)) . "</a></td>
                      <td><a id='bclmodal-$a' onclick='changeModalCloseNumber(`./src/post/mp_closeentry.php?id=`, $a); addModal(`bclmodal-$a`, `clmodal`);'><img src='./src/images/delete.png' /></a></td>
                      <td><a href='./editentry.php?id={$a}'><img src='./src/images/edit.png' /></a></td>
                    </tr>";
            } elseif ($d == 0) {
              echo "<tr>
                      <td class='trclosed'>&nbsp;</td>
                      <td><a href='./profile.php?id=$b'>" . ucfirst($ba) . "</a></td>
                      <td class='txtalgncenter'>$e</td>
                      <td><a href='./problem.php?id=$a'>" . ucfirst(utf8_encode($c)) . "</a></td>
                      <td></td>
                      <td><a href='./editentry.php?id={$a}'><img src='./src/images/edit.png' /></a></td>
                    </tr>";
            } } elseif (is_numeric($filter) & $filter == 0){ // 0 - closed
          if ($d == 0){
            echo "<tr>
                    <td class='trclosed'>&nbsp;</td>
                    <td><a href='./profile.php?id=$b'>" . ucfirst($ba) . "</a></td>
                    <td class='txtalgncenter'>$e</td>
                    <td><a href='./problem.php?id=$a'>" . ucfirst(utf8_encode($c)) . "</a></td>
                    <td></td>
                    <td><a href='./editentry.php?id={$a}'><img src='./src/images/edit.png' /></a></td>
                  </tr>";
          } } elseif ($filter == 1){ // 1 - open
          if ($d == 1 || $d == 2){
            echo "<tr>
                    <td class='tropen'>&nbsp;</td>
                    <td><a href='./profile.php?id=$b'>" . ucfirst($ba) . "</a></td>
                    <td class='txtalgncenter'>$e</td>
                    <td><a href='./problem.php?id=$a'>" . ucfirst(utf8_encode($c)) . "</a></td>
                    <td><a id='bclmodal-$a' onclick='changeModalCloseNumber(`./src/post/mp_closeentry.php?id=`, $a); addModal(`bclmodal-$a`, `clmodal`);'><img src='./src/images/delete.png' /></a></td>
                    <td><a href='./editentry.php?id={$a}'><img src='./src/images/edit.png' /></a></td>
                  </tr>";
          } } elseif ($filter == 2){ // 2 - urgent
          if ($d == 2){
            echo "<tr>
                    <td class='trurgent'>&nbsp;</td>
                    <td><a href='./profile.php?id=$b'>" . ucfirst($ba) . "</a></td>
                    <td class='txtalgncenter'>$e</td>
                    <td><a href='./problem.php?id=$a'>" . ucfirst(utf8_encode($c)) . "</a></td>
                    <td><a id='bclmodal-$a' onclick='changeModalCloseNumber(`./src/post/mp_closeentry.php?id=`, $a); addModal(`bclmodal-$a`, `clmodal`);'><img src='./src/images/delete.png' /></a></td>
                    <td><a href='./editentry.php?id={$a}'><img src='./src/images/edit.png' /></a></td>
                  </tr>";
          } } }
      echo "</tbody></table>
  </section>
  <section class='cSpaceSmall'>
    <section>
      <div class='manager-explanation'>";

      include_once './src/bit/manager_exp.php';

      echo "</div>
    </section>
  </section>";
    }
?>
