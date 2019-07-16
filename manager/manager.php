<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
      // Make so the entry get status=2 if a day has passed
      include './src/db/connect.php';
      include_once './src/bit/htmlconfig.php';

      $nfe = $_GET['nfe'];
      $filter = $_GET['filter']; // 0 - closed, 1 - open, 2 - urgent, null = all

      $section_title = 'Manager';
      if (is_NULL($filter)){ $page_title = 'Todas as ocorrências'; }
      elseif ($filter == 0) { $page_title = 'Filtrando por ocorrências finalizadas'; }
      elseif ($filter == 1) { $page_title = 'Filtrando por ocorrências pendentes'; }
      elseif ($filter == 2) { $page_title = 'Filtrando por ocorrências urgentes'; }
      elseif ($filter == 20) { $page_title = 'Filtrando por NFe finalizada'; }
      elseif ($filter == 21) { $page_title = 'Filtrando por NFe pendente'; }
      elseif ($filter == 22) { $page_title = 'Filtrando por NFe urgente'; }
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
              if (is_NULL($nfe) || $nfe = 0){
                include_once "./src/bit/manager_main.php";
              } else {
                include_once "./src/bit/manager_nfe.php";
              }
              ?>
        </section>
        </div>
    </div>
      <?php include_once './src/bit/footer.php'; ?>
  </body>
</html>
