<?php

session_start();
$sUsergroup = $_SESSION['login'][1];

  if (is_NULL($filter)){
    $pagination = $db->prepare("SELECT * FROM man_entity");
  } else {
    $pagination = $db->prepare("SELECT * FROM man_entity WHERE isActive=$entityFilter AND entgroup=$sUsergroup");
  }

  $pagination->execute();
  $rowcount = $pagination->rowCount();

  $finalpage = $rowcount/$maxperpage;
  $finalpagemodule = $rowcount%$maxperpage;
  if ($finalpagemodule >= 1){ $finalpage++; }
  if (is_NULL($page)){ $page = 1; }
  $i = 1;

if (intval($finalpage) !== 1){
  echo "<nav class='pagination is-small' role='navigation' aria-label='pagination'>";
  if ($page > 1){
    $previouspage = $page-1;
    echo "<a href='?entity&page=$previouspage' class='pagination-previous'>Anterior</a>";
  }
  if ($page < intval($finalpage)){
    $nextpage = $page+1;
    echo "<a href='?entity&page=$nextpage' class='pagination-next'>Proxima</a>";
  }

  echo "<ul class='pagination-list'>";

  while ($i <= $finalpage){
    if ($i == $page){
      echo "<li>
        <a href='?entity&page=$i' class='pagination-link is-current' aria-label='Page $i' aria-current='page'>$i</a>
      </li>";
      $i++;
    } else {
      echo "<li>
        <a href='?entity&page=$i' class='pagination-link' aria-label='Goto page $i'>$i</a>
      </li>";
      $i++;
    }
  }
  echo "</ul>
  </nav>";
}
 ?>
