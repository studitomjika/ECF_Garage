<?php

  // A charger depuis la base de données
  function getComments()
  {
    $comments = file_get_contents(__DIR__."/comments.json");
    $comments = json_decode($comments, true);

    foreach($comments as $comment) {
      if ( is_array($comment) && $comment['accepted']) {
        echo "<div class='comment'>";
        echo "<p class='text'>".$comment['text']."</p>";
        echo "<div class='flex comment-note'>";
        echo "<p class='note'>".$comment['note']."/5</p>";
        echo "<p class='name'>".$comment['name']."</p>";
        echo "</div>";
        echo "</div>";
      }
    }
  }
?>