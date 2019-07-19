<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php

      // ToDo - Make so the entry get status=2 if a day has passed
      include_once './src/bit/login_verification.php';
      include './src/db/connect.php';
      include_once './src/bit/core_htmlconfig.php';

      $nfe = $_GET['nfe'];
      $entity = $_GET['entity'];
      $sped = $_GET['sped'];
      $filter = $_GET['filter']; // 0 - closed, 1 - open, 2 - urgent, null = all

      $section_title = 'Manager';
      include_once './src/bit/manager_title.php';
      echo "<title>{$section_title} - {$page_title}</title>";



    ?>
  </head>
  <body>
    <?php
      include_once './src/bit/core_navbar.php';
      include_once './src/bit/core_header.php';
      // Modals
      include_once './src/bit/modal_addentry.php';
      include_once './src/bit/modal_editentry.php';
      include_once './src/bit/modal_closeentry.php';
      include_once './src/bit/modal_addnfe.php';
      include_once './src/bit/modal_addentity.php';
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
      <?php include_once './src/bit/core_footer.php'; ?>
  </body>
</html>
