<?php

// A charger depuis la base de données
  function getHours()
  {
    $openingHours = file_get_contents(__DIR__."/hours.json");
    $openingHours = json_decode($openingHours, true);

    foreach($openingHours as $day => $hours) {
      if (is_array($hours)) {
        echo '<p>'.substr($day, 0, 3).'. : '.implode(', ',$hours).'</p>';
      }
      else {
        echo '<p>'.$hours.'</p>';
      }
    }
  }
?>