<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Masshiro's Lair</title>
    <?php include './bit/core_htmlconfig.php'; ?>
    </script>
  </head>
  <body>
    <div class="columns">
      <div class="column is-three-fifths">
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
                        <h3><a href='post.php?page=$row[postid]'>" . utf8_encode($row["posttitle"]) . "</a></h3>
                              <h5>Autor: $row[username] | Date: $row[postdate] | Tags: $row[posttags]</h4>";
                        echo utf8_encode($row["postcontent"]);
                        echo "</div>";
                      }
                      ?>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </body>
</html>
