<?php

  $page = $_GET["page"];
  $finalpage = 10; // numRows / maxPerPage -> toInt
  if (is_NULL($page)){ $page = 1; }
  $i = $page;

    echo "<nav class='pagination is-small' role='navigation' aria-label='pagination'>";
    if ($page > 1){
      $previouspage = $page-1;
      echo "<a href='?page=$previouspage' class='pagination-previous'>Previous</a>";
    }
    if ($page < $finalpage){
      $nextpage = $page+1;
      echo "<a href='?page=$nextpage' class='pagination-next'>Next page</a>";
    }

    echo "<ul class='pagination-list'>";

    while ($i <= $finalpage){
      if ($i == $page){
        echo "<li>
          <a href='?page=$i' class='pagination-link is-current' aria-label='Page $i' aria-current='page'>$i</a>
        </li>";
        $i++;
      } else {
        echo "<li>
          <a href='?page=$i' class='pagination-link' aria-label='Goto page $i'>$i</a>
        </li>";
        $i++;
      }
    }

    echo "</ul>
    </nav>";



 ?>
