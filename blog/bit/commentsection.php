<?php
  $page = $_GET["page"];
  include './../admin/db/connect.php';

  $data = $db->query("SELECT bc.commentid, bc.commentpost, bc.commentauthor, bc.commentcontent, bc.commentdate, bc.commentrep, hu.userid, hu.username, bp.postid
                      FROM blog_comments AS bc
                      JOIN hub_users AS hu
                      ON bc.commentauthor = hu.userid
                      JOIN blog_posts AS bp
                      ON bc.commentpost = bp.postid
                      WHERE postid = $page
                      ORDER BY bc.commentrep DESC");

  while ($row = $data->fetch()){
    if ($row["commentrep"] > 0){ $rep = "<span style='color: green'>$row[commentrep]</span>"; }
    elseif ($row["commentrep"] == 0){ $rep = "<span style='color: black'>$row[commentrep]</span>"; }
    else { $rep = "<span style='color: red'>$row[commentrep]</span>"; }

    echo "<div class='commentbit'>
    <h6> > [$rep] $row[username] - $row[commentdate] ID $row[commentid]</h6>" . utf8_encode($row["commentpost"]) . "</div>";
  }

?>
