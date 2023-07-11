<?php

function DBconnect()
{
  try {
    $pdo = new SQLite3('./Garage.db');
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
  global $PDO;
  $queryTxt = 'SELECT * FROM openings_hours';
  $results = $PDO->query($queryTxt);
  $openingHours = [];

  while ($row = $results->fetchArray()) {
    $openingHours[$row['day']] = $row['hours'];
  }
  
  foreach($openingHours as $day['day'] => $hours['hours']) {
    echo '<p>'.substr($day['day'], 0, 3).'. : '.$hours['hours'].'</p>';
  }


  /*$openingHours = [];
  try{
    echo 'possible';
  foreach($PDO->query('SELECT * FROM Horaires') as $results) {
    echo 'possible2';
    $row = $results->fetchArray();
    $openingHours[$row['Jour']] = $row['Horaire'];
    echo '<p>'.substr($day['Jour'], 0, 3).'. : '.$hours['Horaire'].'</p>';
  }
  }
  catch (PDOException $e){
    echo 'impossible';
  }*/
  }

  function getServices()
  {
    global $PDO;
    $results = $PDO->query('SELECT text FROM services');
    $services = [];
    while ($row = $results->fetchArray()) {
      array_push($services, $row['text']);
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
    $results = $PDO->query('SELECT * FROM comments');
    $comments = [];
    while ($row = $results->fetchArray()) {
      array_push($comments, $row);
    }

    foreach($comments as $comment) {
      if ( is_array($comment) && ($comment['accepted'] == 1)) {
        echo "<div class='comment'>";
        echo "<p class='text'>".$comment['message']."</p>";
        echo "<div class='flex comment-note'>";
        echo "<p class='note'>".$comment['grade']."/5</p>";
        echo "<p class='name'>".$comment['name']."</p>";
        echo "</div>";
        echo "</div>";
      }
    }
  }

  function getCarDeals()
  {
    global $PDO, $CONFIGS;
    $results = $PDO->query('SELECT * FROM used_cars');
    $carDeals = [];
    while ($row = $results->fetchArray()) {
      array_push($carDeals, $row);
    }

  foreach($carDeals as $carDeal) {
      echo "<div class='car-deal show'>";
      echo "<div class='photo'>";
      if ( !empty($CONFIGS['formulaire_contact']) ) {
        echo '<a class="like-button open-modal-onclick deal-contact" data-modal="modal-contact">Contact</a>';
      }
      //echo "<a href='#modal-contact' class='deal-contact'>Contact</a>";
      echo "<img src='https://picsum.photos/id/40/1000/800' alt='' width='100%' height='100%'>";
      echo "</div>";
      echo "<div class='twoline'>";
      echo "<p class='model'>".$carDeal['model']."</p>";
      echo "</div>";
      echo "<p class='km'>".$carDeal['kilometres']." km</p>";
      echo "<p class='year'>".$carDeal['year']."</p>";
      echo "<p class='price'>".$carDeal['price']." €</p>";
      echo "<p class='id_car_deal hidden'>".$carDeal['id_occasion']."</p>";
      echo "</div>";
    }
  }