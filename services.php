<?php

/*function getServices()
{
  /*$services = file_get_contents(__DIR__."/services.json");
  $services = json_decode($services, true);*/

  /*try {
    $pdo = new SQLite3('/home/isomorphe/SyncJika/FormationStudi/ECF Final/ECF_Garage/Garage.db');
  } catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
  }
  
  $results = $pdo->query('SELECT Titre FROM Services');
  $services = array();
  while ($row = $results->fetchArray()) {
    array_push($services, $row['Titre']);
  }

  foreach($services as $service) {
      echo "<div class='service'>";
      echo "<img src='gear.svg' width='24' class='icon' alt='icon service'>";
      echo "<p>".$service."</p>";
      echo "</div>";
    }
  }*/
?>