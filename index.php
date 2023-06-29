<?php require_once 'functions.php'; 
$PDO = DBconnect();

$CONFIGS = [];

$results = $PDO->query('SELECT * FROM Configurations');
while ($row = $results->fetchArray()) {
  $CONFIGS[$row['Name']] = $row['Value'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width,initial-scale=1" name="viewport">
  <title>Garage V. Parrot</title>
  <link href="https://fonts.cdnfonts.com/css/barlow" rel="stylesheet">
  <link href="https://fonts.cdnfonts.com/css/rajdhani" rel="stylesheet">
  <link rel="stylesheet" href="style.css?<?= time(); ?>"><!--dev only-->
  <meta name="description" content="">
</head>

<body class="row">
  <aside class="flex col">
    <a href="index.php"><h1>Garage V. Parrot</h1></a>
    <a class="like-button open-modal-onclick" data-modal="modal-connect">Se connecter</a>
    <h2>Horaires d’ouverture</h2>
    <section class="hours">
      <?php getHours(); ?>
    </section>
    <?php

if ( !empty($CONFIGS['formulaire_contact']) ) {
       echo '<a class="like-button open-modal-onclick" data-modal="modal-contact">Contact</a>';
}

?>

    <section class="comments">
      <?php getComments(); ?>
    </section>
    <a class="like-button open-modal-onclick" data-modal="modal-comment">Ajouter un commentaire</a>
  </aside>

  <main class="flex col wrap">
    <h2>Les services du garages:</h2>
    <section class="services-section flex row wrap">
        <?php getServices(); ?>
    </section>

    <h2>Les voitures d'occasion à la vente:</h2>
    <h2><?php echo $CONFIGS['titre_voitures']; ?></h2>
    <form class="filtres" action="cardeals_filter.php" method="post"> <!--//formdata ??-->
      <label for="price-select">Prix</label>
      <select name="price-select" id="price-select">
        <option value="all">Tous les prix</option>
        <option value="bracket1">0€ à 1500€</option>
        <option value="bracket2">1500€ à 3000€</option>
        <option value="bracket3">3000€ à 9000€</option>
        <option value="bracket4">9000€ et +</option>
      </select>
      <label for="km-select">Kilométrage</label>
      <select name="km-select" id="km-select">
        <option value="all">Tous les Kilométrages</option>
        <option value="bracket1">0km à 15 000km</option>
        <option value="bracket2">15 000km à 40 000km</option>
        <option value="bracket3">40 000km à 90 000km</option>
        <option value="bracket4">90 000km et +</option>
      </select>
      <label for="year-select">Année de mise en circulation</label>
      <select name="year-select" id="year-select">
        <option value="all">Toutes les Années</option>
        <option value="bracket1">avant 2000</option>
        <option value="bracket2">2000 à 2007</option>
        <option value="bracket3">2008 à 2014</option>
        <option value="bracket4">2015 à 2023</option>
      </select>
    </form>
    <section class="car-deals-section flex row wrap">
      <div class="car-deals">
        <?php getCarDeals(); ?>
      </div>
    </section>
  </main>

  <div id="modal-connect" class="modal">
    <div>
      <div class="modal-form">
        <a class="close">&times;</a>
        <h2>Contacter le garage</h2>
        <form action="connect.php" method="post">

          <label for="login">Login</label>
          <input type="text" id="login" name="login" placeholder="Votre mail">
      
          <label for="password">Mot de passe</label>
          <input type="password" id="password" name="password" placeholder="Votre mot de passe">
      
          <input type="submit" value="Se connecter" class="like-button">
      
        </form>
      </div>
    </div>
  </div>

  <?php

  if ( !empty($CONFIGS['formulaire_contact']) ) {
    include "contactForm.php";
  }

  ?>


  <div id="modal-comment" class="modal">
    <div>
      <div class="modal-form">
        <a class="close">&times;</a>
        <h2>Ajouter un commentaire</h2>
        <form action="comment.php" class="">

          <label for="name">Nom</label>
          <input type="text" id="name" name="name" placeholder="Votre nom">
      
          <label for="message">Message</label>
          <textarea id="message" name="message" placeholder="Votre commentaire" style="height:200px"></textarea>
      
          <label for="note">Note</label>
          <div class="flex row note-radio">
            <div>
              <input type="radio" id="note-1" name="note" Value="1">
              <label for="note-1">1</label>
            </div>
            <div>
              <input type="radio" id="note-2" name="note" Value="2">
              <label for="note-2">2</label>
            </div>
            <div>
              <input type="radio" id="note-3" name="note" Value="3">
              <label for="note-3">3</label>
            </div>
            <div>
              <input type="radio" id="note-4" name="note" Value="4">
              <label for="note-4">4</label>
            </div>
            <div>
              <input type="radio" id="note-5" name="note" Value="5">
              <label for="note-5">5</label>
            </div>
          </div>

          <input type="submit" value="Envoyer" class="like-button">
      
        </form>
      </div>
    </div>
  </div>

  <script src="filters.js" type="text/javascript"></script>
  <script src="modals.js" type="text/javascript"></script>
</body>
</html>

<?php DBdisconnect(); ?>