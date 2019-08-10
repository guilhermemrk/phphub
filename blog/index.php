<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Masshiro's Lair</title>
    <?php include './bit/core_htmlconfig.php';
          include './bit/format_pattern.php'; ?>
    </script>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-5">
          <div class="window">
            <div class="inner">
                <div class="header">
                    <div class="sprite windows-application-icon"></div>
                    ようこそ我がmasshiro.moeへ
                    <div class="sprite windows-application-controls"></div>
                </div>
                <div class="actions">
                    Masshiro-tan reigns these lands.
                </div>
                <div class="content">
                    <div class="inner">
                      <?php

                      include './admin/db/connect.php';

                      $data = $db->query("SELECT bp.postid, bp.posttitle, bp.postauthor, bp.postcontent, bp.postdate, bp.posttags, hu.userid, hu.username
                                          FROM blog_posts AS bp
                                          JOIN hub_users AS hu
                                          ON bp.postauthor = hu.userid
                                          ORDER BY bp.postdate ASC
                                          LIMIT 5");

                      while ($row = $data->fetch()){
                        echo "<div class='postbit'>
                                <p class='h3'><a href='post.php?page=$row[postid]'>" . utf8_encode($row["posttitle"]) . "</a></p>
                                <p class='h6'>Autor: $row[username] | Date: $row[postdate] | Tags: $row[posttags]</p>" . formatProblem($row["postcontent"], '/(.{250})(.*)/', 250) . "
                              </div>";
                      }
                      ?>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  </body>
</html>
