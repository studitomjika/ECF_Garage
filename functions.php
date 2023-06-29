<?php

function DBconnect()
{
  try {
    $pdo = new SQLite3('/home/isomorphe/SyncJika/FormationStudi/ECF Final/ECF_Garage/Garage.db');
  } catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
  }

  return $pdo;
}

function DBdisconnect() {
  global $PDO;

  $PDO = null;
}

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

function getServices()
{
  global $PDO;
  $results = $PDO->query('SELECT Titre FROM Services');
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
  }

  function getComments()
  {
    global $PDO;
    $results = $PDO->query('SELECT * FROM Commentaires');
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

  function getCarDeals()
  {
    global $PDO;
    $results = $PDO->query('SELECT * FROM Occasions');
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