<?php

    include_once './src/bit/manager_options.php';
    include_once './src/bit/m_addentry.php';
    include_once './src/bit/m_editentry.php';

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
        $c = ucfirst(utf8_encode($row["problem"]));
        $d = $row["status"];
        $e = $row["entryDate"];

        include_once "./src/bit/m_closeentry.php";

        // if ($d == 0) { $da = 'Finalizada'; } elseif ($d == 1){ $da = 'Pendente'; } elseif ($d == 2){ $da = 'Urgente'; }
        if (strlen($ba) >= 20){ $ba = substr($row["companyName"], 0, 20); $ba .= '...';}
        if (strlen($c) >= 100){ $ca = substr(ucfirst(utf8_encode($row["problem"])), 0, 100); $ca .= '...';} else { $ca = ucfirst(utf8_encode($row["problem"])); }
        if (strlen($e) >= 11){ $e = substr($row["entryDate"], 0, 10); }

        if (is_NULL($filter)){
          if ($d == 1){
              echo "<tr>
                      <td class='trstatus$d'>&nbsp;</td>
                      <td><a href='./profile.php?id=$b'>" . ucfirst($ba) . "</a></td>
                      <td class='txtalgncenter'>$e</td>
                      <td><a href='./problem.php?id=$a'>$ca</a></td>
                      <td>
                        <button id='bclmodal-$a' onclick='changeModalCloseNumber(`./src/post/mp_closeentry.php?id=`, $a); addModal(`bclmodal-$a`, `clmodal`);' class='button is-small is-danger'>
                          <span class='icon is-small'>
                            <i class='fas fa-times'></i>
                          </span>
                        </button></a>
                      </td>
                      <td>
                        <button id='bedmodal-$a' onclick='changeManagerModalEdit(`$a`, `$ba`, `$e`, `$c`, `$d`); addModal(`bedmodal-$a`, `edmodal`);' class='button is-small is-warning'>
                          <span class='icon is-small'>
                            <i class='fas fa-pen'></i>
                          </span>
                        </button></a>
                      </td>
                    </tr>";
            } elseif ($d == 2) {
              echo "<tr>
                      <td class='trstatus$d'>&nbsp;</td>
                      <td><a href='./profile.php?id=$b'>" . ucfirst($ba) . "</a></td>
                      <td class='txtalgncenter'>$e</td>
                      <td><a href='./problem.php?id=$a'>$ca</a></td>
                      <td>
                        <button id='bclmodal-$a' onclick='changeModalCloseNumber(`./src/post/mp_closeentry.php?id=`, $a); addModal(`bclmodal-$a`, `clmodal`);' class='button is-small is-danger'>
                          <span class='icon is-small'>
                            <i class='fas fa-times'></i>
                          </span>
                        </button></a>
                      </td>
                      <td>
                        <button id='bedmodal-$a' onclick='changeManagerModalEdit(`$a`, `$ba`, `$e`, `$c`, `$d`); addModal(`bedmodal-$a`, `edmodal`);' class='button is-small is-warning'>
                          <span class='icon is-small'>
                            <i class='fas fa-pen'></i>
                          </span>
                        </button></a>
                      </td>
                    </tr>";
            } elseif ($d == 0) {
              echo "<tr>
                      <td class='trstatus$d'>&nbsp;</td>
                      <td><a href='./profile.php?id=$b'>" . ucfirst($ba) . "</a></td>
                      <td class='txtalgncenter'>$e</td>
                      <td><a href='./problem.php?id=$a'>$ca</a></td>
                      <td>
                        <button class='button is-small is-danger' disabled>
                          <span class='icon is-small'>
                            <i class='fas fa-times'></i>
                          </span>
                        </button></a>
                      </td>
                      <td>
                        <button id='bedmodal-$a' onclick='changeManagerModalEdit(`$a`, `$ba`, `$e`, `$c`, `$d`); addModal(`bedmodal-$a`, `edmodal`);' class='button is-small is-warning'>
                          <span class='icon is-small'>
                            <i class='fas fa-pen'></i>
                          </span>
                        </button></a>
                      </td>
                    </tr>";
            } } elseif (is_numeric($filter) & $filter == 0){ // 0 - closed
          if ($d == 0){
            echo "<tr>
                    <td class='trstatus$d'>&nbsp;</td>
                    <td><a href='./profile.php?id=$b'>" . ucfirst($ba) . "</a></td>
                    <td class='txtalgncenter'>$e</td>
                    <td><a href='./problem.php?id=$a'>$ca</a></td>
                    <td>
                      <button class='button is-small is-danger' disabled>
                        <span class='icon is-small'>
                          <i class='fas fa-times'></i>
                        </span>
                      </button></a>
                    </td>
                    <td>
                      <button id='bedmodal-$a' onclick='changeManagerModalEdit(`$a`, `$ba`, `$e`, `$c`, `$d`); addModal(`bedmodal-$a`, `edmodal`);' class='button is-small is-warning'>
                        <span class='icon is-small'>
                          <i class='fas fa-pen'></i>
                        </span>
                      </button></a>
                    </td>
                  </tr>";
          } } elseif ($filter == 1){ // 1 - open
          if ($d == 1 || $d == 2){
            echo "<tr>
                    <td class='trstatus$d'>&nbsp;</td>
                    <td><a href='./profile.php?id=$b'>" . ucfirst($ba) . "</a></td>
                    <td class='txtalgncenter'>$e</td>
                    <td><a href='./problem.php?id=$a'>$ca</a></td>
                    <td>
                      <button id='bclmodal-$a' onclick='changeModalCloseNumber(`./src/post/mp_closeentry.php?id=`, $a); addModal(`bclmodal-$a`, `clmodal`);' class='button is-small is-danger'>
                        <span class='icon is-small'>
                          <i class='fas fa-times'></i>
                        </span>
                      </button></a>
                    </td>
                    <td>
                      <button id='bedmodal-$a' onclick='changeManagerModalEdit(`$a`, `$ba`, `$e`, `$c`, `$d`); addModal(`bedmodal-$a`, `edmodal`);' class='button is-small is-warning'>
                        <span class='icon is-small'>
                          <i class='fas fa-pen'></i>
                        </span>
                      </button></a>
                    </td>
                  </tr>";
          } } elseif ($filter == 2){ // 2 - urgent
          if ($d == 2){
            echo "<tr>
                    <td class='trstatus$d'>&nbsp;</td>
                    <td><a href='./profile.php?id=$b'>" . ucfirst($ba) . "</a></td>
                    <td class='txtalgncenter'>$e</td>
                    <td><a href='./problem.php?id=$a'>$ca</a></td>
                    <td>
                      <button id='bclmodal-$a' onclick='changeModalCloseNumber(`./src/post/mp_closeentry.php?id=`, $a); addModal(`bclmodal-$a`, `clmodal`);' class='button is-small is-danger'>
                        <span class='icon is-small'>
                          <i class='fas fa-times'></i>
                        </span>
                      </button></a>
                    </td>
                    <td>
                      <button id='bedmodal-$a' onclick='changeManagerModalEdit(`$a`, `$ba`, `$e`, `$c`, `$d`); addModal(`bedmodal-$a`, `edmodal`);' class='button is-small is-warning'>
                        <span class='icon is-small'>
                          <i class='fas fa-pen'></i>
                        </span>
                      </button></a>
                    </td>
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
