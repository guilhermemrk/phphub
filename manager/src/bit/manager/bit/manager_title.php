<?php

  if (is_NULL($filter) && is_NULL($nfe) && is_NULL($entity) && is_NULL($sped)){ $page_title = 'Todas as ocorrências'; }
  elseif (is_NULL($filter) && !is_NULL($nfe) && is_NULL($entity) && is_NULL($sped)){ $page_title = 'Todas as NFe'; }
  elseif (is_NULL($filter) && is_NULL($nfe) && !is_NULL($entity) && is_NULL($sped)){ $page_title = 'Todas as entidades'; }
  elseif (is_NULL($filter) && is_NULL($nfe) && is_NULL($entity) && !is_NULL($sped)){ $page_title = 'Todos os SPEDs'; }
  elseif ($filter == 0) { $page_title = 'Filtrando por ocorrências finalizadas'; }
  elseif ($filter == 1) { $page_title = 'Filtrando por ocorrências pendentes'; }
  elseif ($filter == 2) { $page_title = 'Filtrando por ocorrências urgentes'; }
  elseif ($filter == 20) { $page_title = 'Filtrando por NFe finalizada'; }
  elseif ($filter == 21) { $page_title = 'Filtrando por NFe pendente'; }
  elseif ($filter == 22) { $page_title = 'Filtrando por NFe urgente'; }
  elseif ($filter == 30) { $page_title = 'Filtrando por Entidade inativa'; }
  elseif ($filter == 31) { $page_title = 'Filtrando por Entidade ativa'; }
  elseif ($filter == 40) { $page_title = 'Filtrando por SPED finalizado'; }
  elseif ($filter == 41) { $page_title = 'Filtrando por SPED pendente'; }

?>
