<?php

  $page = $_GET["page"];
  $nfe = $_GET["nfe"];
  $entity = $_GET["entity"];

  $pagination = $db->prepare("SELECT * FROM man_entity");
  $pagination->execute();

  $rowcount = $pagination->rowCount();

  $finalpage = $rowcount/15;
  $finalpagemodule = $rowcount%15;
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
