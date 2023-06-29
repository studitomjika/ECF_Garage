<?php

  // A charger depuis la base de données
  function getCarDeals()
  {
    /*$carDeals = file_get_contents(__DIR__."/car-deals.json");
    $carDeals = json_decode($carDeals, true);*/


    try {
        $pdo = new SQLite3('/home/isomorphe/SyncJika/FormationStudi/ECF Final/ECF_Garage/Garage.db');
      } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
      }
      
      $results = $pdo->query('SELECT * FROM Occasions');
      $carDeals = array();
      while ($row = $results->fetchArray()) {
        array_push($carDeals, $row);
      }

    foreach($carDeals as $carDeal) {
        echo "<div class='car-deal show'>";
        echo "<div class='photo'>";
        echo "<a href='#modal-contact' class='deal-contact'>Contact</a>";
        echo "<img src='https://picsum.photos/id/40/1000/800' alt='' width='100%' height='100%'>";
        echo "</div>";
        echo "<div class='twoline'>";
        echo "<p class='model'>".$carDeal['Model']."</p>";
        echo "</div>";
        echo "<p class='km'>".$carDeal['Kilometres']." km</p>";
        echo "<p class='year'>".$carDeal['Année']."</p>";
        echo "<p class='price'>".$carDeal['Prix']." €</p>";
        echo "</div>";
    }
  }
?>