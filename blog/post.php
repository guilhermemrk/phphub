<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php $page = $_GET['page']; ?>
    <meta charset="utf-8">
    <title>Post</title>
    <?php include './bit/core_htmlconfig.php'; ?>
    </script>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-9">
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
                                          WHERE postid = $page
                                          ORDER BY bp.postdate ASC
                                          LIMIT 1");

                      while ($row = $data->fetch()){
                        echo "<div class='postbit'>
                        <h3><a href='#$row[postid]'>" . utf8_encode($row["posttitle"]) . "</a></h3>
                              <h6>Autor: $row[username] | Date: $row[postdate] | Tags: $row[posttags]</h6>". utf8_encode($row["postcontent"]) . "</div>";
                      }
                      ?>
                      <div class="commentsection">
                        <?php include './bit/commentsection.php'; ?>
                      </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  </body>
</html>
