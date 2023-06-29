<?php

/*$sqlite = 'sqlite:/home/studio1656/Syncjika/FormationStudi/ECF Final/ECF_Garage/Garage.db';
try {
  $pdo = new PDO($sqlite);
} catch (PDOException $e) {
  print "Erreur !: " . $e->getMessage() . "<br/>";
  die();
}

//$db = new SQLite3('Garage.db');

$results = $pdo->query('SELECT Titre FROM Services');
while ($row = $results->fetchArray()) {
    var_dump($row);
}*/

function getServices()
{
  $services = file_get_contents(__DIR__."/services.json");
  $services = json_decode($services, true);

  foreach($services['services'] as $service) {
      echo "<div class='service'>";
      echo "<img src='gear.svg' width='24' class='icon' alt='icon service'>";
      echo "<p>".$service."</p>";
      echo "</div>";
    }
  }
?>