<?php

    include_once './src/bit/manager_options.php';
    include_once './src/bit/m_addentry.php';

    $sql = "SELECT * FROM manager AS m JOIN entity AS e ON m.companyid = e.companyid WHERE status IN (20,21,22) ORDER BY status DESC, entryDate ASC LIMIT 50";

    if ($results = $conn->query($sql)){

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

      while ($row = $results->fetch_assoc()){
        $a = utf8_encode($row["entryid"]);
        $b = utf8_encode($row["companyid"]);
        $ba = utf8_encode($row["companyName"]);
        $c = utf8_encode($row["nfe_modelo"]);
        $d = utf8_encode($row["nfe_id"]);
        $e = utf8_encode($row["nfe_nv"]);
        $f = utf8_encode($row["nfe_nf"]);
        $g = utf8_encode($row["entryDate"]);
        $h = utf8_encode($row["problem"]);
        $i = utf8_encode($row["status"]);
        $ia = substr($row["status"], 1, 2);
        $j = utf8_encode($row["nfe_todo"]);

        include_once "./src/bit/m_closeentry.php";

        if ($c == '55'){ $ca = 'NFe'; } elseif ($c == '65'){ $ca = 'NFCe'; }
        if (is_numeric($j) && $j == 0){ $ja = 'Cancelar'; } elseif ($j == 1){ $ja = 'Autorizar'; } elseif ($j == 2){ $ja = 'Inutilizar'; } elseif ($j == 3){ $ja = 'Outro'; }
        if (strlen($h) >= 30){ $h = substr($row["problem"], 0, 30); $h .= '...'; }
        if (strlen($ba) >= 20){ $ba = substr($row["companyName"], 0, 20); $ba .= '...';}
        if (strlen($g) >= 11){ $g = substr($row["entryDate"], 0, 10); }

        if (is_NULL($filter)){
          if ($i == 21){
              echo "<tr>
                      <td class='trstatus$ia'>&nbsp;</td>
                      <td><a href='./profile.php?id=$b'>" . ucfirst($ba) . "</a></td>
                      <td class='txtalgncenter'>$g</td>
                      <td class='txtalgncenter'>$ca</td>
                      <td class='txtalgncenter'>$d</th>
                      <td class='txtalgncenter'>$e</th>
                      <td class='txtalgncenter'>$f</th>
                      <td class='txtalgncenter'>$ja</th>
                      <td><a href='./problem.php?id=$a'>" . ucfirst($h) . "</a></td>
                      <!--td><a '><img src='./src/images/delete.png' /></a></td-->
                      <td>
                        <button id='bclmodal-$a' onclick='changeModalCloseNumber(`./src/post/mp_closeentry.php?isNfe&id=`, $a); addModal(`bclmodal-$a`, `clmodal`);' class='button is-small is-danger'>
                          <span class='icon is-small'>
                            <i class='fas fa-times'></i>
                          </span>
                        </button></a>
                      </td>
                      <td>
                        <button onclick='window.location.href=`#`' class='button is-small is-warning'>
                          <span class='icon is-small'>
                            <i class='fas fa-pen'></i>
                          </span>
                        </button></a>
                      </td>
                    </tr>
                    </tr>";
            } elseif ($i == 22) {
              echo "<tr>
                      <td class='trstatus$ia'>&nbsp;</td>
                      <td><a href='./profile.php?id=$b'>" . ucfirst($ba) . "</a></td>
                      <td class='txtalgncenter'>$g</td>
                      <td class='txtalgncenter'>$ca</td>
                      <td class='txtalgncenter'>$d</th>
                      <td class='txtalgncenter'>$e</th>
                      <td class='txtalgncenter'>$f</th>
                      <td class='txtalgncenter'>$ja</th>
                      <td><a href='./problem.php?id=$a'>" . ucfirst($h) . "</a></td>
                      <!--td><a id='bclmodal-$a' onclick='changeModalCloseNumber(`./src/post/mp_closeentry.php?isNfe&id=`, $a); addModal(`bclmodal-$a`, `clmodal`);'><img src='./src/images/delete.png' /></a></td-->
                      <td>
                        <button id='bclmodal-$a' onclick='changeModalCloseNumber(`./src/post/mp_closeentry.php?isNfe&id=`, $a); addModal(`bclmodal-$a`, `clmodal`);' class='button is-small is-danger'>
                          <span class='icon is-small'>
                            <i class='fas fa-times'></i>
                          </span>
                        </button></a>
                      </td>
                      <td>
                        <button onclick='window.location.href=`#`' class='button is-small is-warning'>
                          <span class='icon is-small'>
                            <i class='fas fa-pen'></i>
                          </span>
                        </button></a>
                      </td>
                    </tr>";
            } elseif ($i == 20) {
              echo "<tr>
                      <td class='trstatus$ia'>&nbsp;</td>
                      <td><a href='./profile.php?id=$b'>" . ucfirst($ba) . "</a></td>
                      <td class='txtalgncenter'>$g</td>
                      <td class='txtalgncenter'>$ca</td>
                      <td class='txtalgncenter'>$d</th>
                      <td class='txtalgncenter'>$e</th>
                      <td class='txtalgncenter'>$f</th>
                      <td class='txtalgncenter'>$ja</th>
                      <td><a href='./problem.php?id=$a'>" . ucfirst($h) . "</a></td>
                      <td>
                        <button class='button is-small is-danger' disabled>
                          <span class='icon is-small'>
                            <i class='fas fa-times'></i>
                          </span>
                        </button></a>
                      </td>
                      <td>
                        <button onclick='window.location.href=`#`' class='button is-small is-warning'>
                          <span class='icon is-small'>
                            <i class='fas fa-pen'></i>
                          </span>
                        </button></a>
                      </td>
                    </tr>
                    </tr>";
            } } elseif ($filter == 20){ // 0 - closed
          if ($i == 20){
            echo "<tr>
                    <td class='trstatus$ia'>&nbsp;</td>
                    <td><a href='./profile.php?id=$b'>" . ucfirst($ba) . "</a></td>
                    <td class='txtalgncenter'>$g</td>
                    <td class='txtalgncenter'>$ca</td>
                    <td class='txtalgncenter'>$d</th>
                    <td class='txtalgncenter'>$e</th>
                    <td class='txtalgncenter'>$f</th>
                    <td class='txtalgncenter'>$ja</th>
                    <td><a href='./problem.php?id=$a'>" . ucfirst($h) . "</a></td>
                    <td>
                      <button class='button is-small is-danger' disabled>
                        <span class='icon is-small'>
                          <i class='fas fa-times'></i>
                        </span>
                      </button></a>
                    </td>
                    <td>
                      <button onclick='window.location.href=`#`' class='button is-small is-warning'>
                        <span class='icon is-small'>
                          <i class='fas fa-pen'></i>
                        </span>
                      </button></a>
                    </td>
                  </tr>
                  </tr>";
          } } elseif ($filter == 21){ // 1 - open
          if ($i == 21 || $i == 22){
            echo "<tr>
                    <td class='trstatus$ia'>&nbsp;</td>
                    <td><a href='./profile.php?id=$b'>" . ucfirst($ba) . "</a></td>
                    <td class='txtalgncenter'>$g</td>
                    <td class='txtalgncenter'>$ca</td>
                    <td class='txtalgncenter'>$d</th>
                    <td class='txtalgncenter'>$e</th>
                    <td class='txtalgncenter'>$f</th>
                    <td class='txtalgncenter'>$ja</th>
                    <td><a href='./problem.php?id=$a'>" . ucfirst($h) . "</a></td>
                    <td>
                      <button id='bclmodal-$a' onclick='changeModalCloseNumber(`./src/post/mp_closeentry.php?isNfe&id=`, $a); addModal(`bclmodal-$a`, `clmodal`);' class='button is-small is-danger'>
                        <span class='icon is-small'>
                          <i class='fas fa-times'></i>
                        </span>
                      </button></a>
                    </td>
                    <td>
                      <button onclick='window.location.href=`./manager.php?entity`' class='button is-small is-warning'>
                        <span class='icon is-small'>
                          <i class='fas fa-pen'></i>
                        </span>
                      </button></a>
                    </td>
                  </tr>
                  </tr>";
          } } elseif ($filter == 22){ // 2 - urgent
          if ($i == 22){
            echo "<tr>
                    <td class='trstatus$ia'>&nbsp;</td>
                    <td><a href='./profile.php?id=$b'>" . ucfirst($ba) . "</a></td>
                    <td class='txtalgncenter'>$g</td>
                    <td class='txtalgncenter'>$ca</td>
                    <td class='txtalgncenter'>$d</th>
                    <td class='txtalgncenter'>$e</th>
                    <td class='txtalgncenter'>$f</th>
                    <td class='txtalgncenter'>$ja</th>
                    <td><a href='./problem.php?id=$a'>" . ucfirst($h) . "</a></td>
                    <td>
                      <button id='bclmodal-$a' onclick='changeModalCloseNumber(`./src/post/mp_closeentry.php?isNfe&id=`, $a); addModal(`bclmodal-$a`, `clmodal`);' class='button is-small is-danger'>
                        <span class='icon is-small'>
                          <i class='fas fa-times'></i>
                        </span>
                      </button></a>
                    </td>
                    <td>
                      <button onclick='window.location.href=`./manager.php?entity`' class='button is-small is-warning'>
                        <span class='icon is-small'>
                          <i class='fas fa-pen'></i>
                        </span>
                      </button></a>
                    </td>
                  </tr>
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
