<?php require_once 'functions.php'; 
$PDO = DBconnect();

$CONFIGS = [];

  $results = $PDO->query('SELECT * FROM configurations');
  while ($row = $results->fetchArray()) {
    $CONFIGS[$row['name']] = $row['value'];
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
  <link rel="stylesheet" href="style.css?<?= time(); ?>"><!--dev only for CSS cache reload-->
  <meta name="description" content="">
</head>

<body class="row">
  <aside class="flex col">
    <a href="index.php"><h1>Garage V. Parrot</h1></a>
    <?php
        if ( !empty($CONFIGS['formulaire_connect']) ) {
              echo '<a class="like-button open-modal-onclick" data-modal="modal-connect">Se connecter</a>';
        }
      ?>
    <h2><?= $CONFIGS['titre_horaires']; ?></h2>
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
    <?php
        if ( !empty($CONFIGS['formulaire_comment']) ) {
              echo '<a class="like-button open-modal-onclick" data-modal="modal-comment">Ajouter un commentaire</a>';
        }
      ?>
  </aside>

  <main class="flex col wrap">
    <h2><?= $CONFIGS['titre_services']; ?></h2>
    <section class="services-section flex row wrap">
        <?php getServices(); ?>
    </section>

    <h2><?= $CONFIGS['titre_voitures']; ?></h2>
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

  <?php
    if ( !empty($CONFIGS['formulaire_connect']) ) {
      include "connectForm.php";
    }
    if ( !empty($CONFIGS['formulaire_contact']) ) {
      include "contactForm.php";
    }
    if ( !empty($CONFIGS['formulaire_comment']) ) {
      include "commentForm.php";
    }
  ?>

  <script src="filters.js" type="text/javascript"></script>
  <script src="modals.js" type="text/javascript"></script>
</body>
</html>

<?php DBdisconnect(); ?>