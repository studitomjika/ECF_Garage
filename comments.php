<?php

  function getComments()
  {
    /*$comments = file_get_contents(__DIR__."/comments.json");
    $comments = json_decode($comments, true);*/

    try {
    $pdo = new SQLite3('/home/isomorphe/SyncJika/FormationStudi/ECF Final/ECF_Garage/Garage.db');
    } catch (PDOException $e) {
      print "Erreur !: " . $e->getMessage() . "<br/>";
      die();
    }
    
    $results = $pdo->query('SELECT * FROM Commentaires');
    $comments = array();
    while ($row = $results->fetchArray()) {
      array_push($comments, $row);
    }

    foreach($comments as $comment) {
      if ( is_array($comment) && ($comment['Accepted'] == 1)) {
        echo "<div class='comment'>";
        echo "<p class='text'>".$comment['Text']."</p>";
        echo "<div class='flex comment-note'>";
        echo "<p class='note'>".$comment['Note']."/5</p>";
        echo "<p class='name'>".$comment['Nom']."</p>";
        echo "</div>";
        echo "</div>";
      }
    }
  }
?>