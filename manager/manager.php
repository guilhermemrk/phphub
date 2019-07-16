<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
      // Make so the entry get status=2 if a day has passed
      include './src/db/connect.php';
      include_once './src/bit/htmlconfig.php';

      $nfe = $_GET['nfe'];
      $entity = $_GET['entity'];
      $sped = $_GET['sped'];
      $filter = $_GET['filter']; // 0 - closed, 1 - open, 2 - urgent, null = all

      $section_title = 'Manager';
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
      echo "<title>{$section_title} - {$page_title}</title>";



    ?>
  </head>
  <body>
    <?php
      include_once './src/bit/navbar.php';
      include_once './src/bit/header.php';
    ?>
    <div class='columns is-centered'>
        <div class='column is-full'>
        <section class='container'>
          <section class='cSpaceAfterHeaderTable'>
              <?php
              if (is_NULL($nfe) && is_NULL($entity) && is_NULL($sped)){
                include_once "./src/bit/manager_main.php";
              } elseif (!is_NULL($nfe)) {
                include_once "./src/bit/manager_nfe.php";
              } elseif (!is_NULL($entity)) {
                include_once "./src/bit/manager_entity.php";
              } elseif (!is_NULL($sped)) {
                include_once "./src/bit/manager_sped.php";
              }
              ?>
        </section>
        </div>
    </div>
      <?php include_once './src/bit/footer.php'; ?>
  </body>
</html>
