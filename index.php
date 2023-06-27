<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width,initial-scale=1" name="viewport">
  <title>Garage V. Parrot</title>
  <link href="https://fonts.cdnfonts.com/css/barlow" rel="stylesheet">
  <link href="https://fonts.cdnfonts.com/css/rajdhani" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <meta name="description" content="">
</head>

<body class="row">

  <aside class="flex col">
    <h1>Garage V. Parrot</h1>
    <a href="#modal-connect" class="like-button">Se connecter</a>
    <h2>Horaires d’ouverture</h2>
    <section class="hours">
      <?php
      // A charger depuis la base de données
      $opening_hours = file_get_contents(__DIR__."/hours.json");
      $opening_hours = json_decode($opening_hours, true);

      foreach($opening_hours as $day => $hours) {
        if (is_array($hours)) {
          echo '<p>'.substr($day, 0, 3).'. : '.implode(', ',$hours).'</p>';
        }
        else {
          echo '<p>'.$hours.'</p>';
        }
      }
      ?>
    </section>
    <a href="#modal-contact" class="like-button">Contact</a>
    <section class="comments">
      <?php
        // A charger depuis la base de données
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
      ?>
    </section>
    <a href="#modal-comment" class="like-button">Ajouter un commentaire</a>
  </aside>

  <main class="flex col wrap">
    <h2>Les services du garages:</h2>
    <section class="services-section flex row wrap">
      <?php
        // A charger depuis la base de données
        $services = file_get_contents(__DIR__."/services.json");
        $services = json_decode($services, true);

        foreach($services['services'] as $service) {
            echo "<div class='service'>";
            echo "<img src='gear.svg' width='24' class='icon' alt='icon service'>";
            echo "<p>".$service."</p>";
            echo "</div>";
          }
      ?>
    </section>

    <h2>Les voitures d'occasion à la vente:</h2>
    <section class="filtres">
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
    </section>
    <section class="car-deals-section flex row wrap">
      <div class="car-deals">
        <?php
          // A charger depuis la base de données
          $carDeals = file_get_contents(__DIR__."/car-deals.json");
          $carDeals = json_decode($carDeals, true);

          foreach($carDeals as $carDeal) {
              echo "<div class='car-deal show'>";
              echo "<div class='photo'>";
              echo "<a href='#modal-contact' class='deal-contact'>Contact</a>";
              echo "<img src='https://picsum.photos/id/40/1000/800' alt='' width='100%' height='100%'>";
              echo "</div>";
              echo "<div class='twoline'>";
              echo "<p class='model'>".$carDeal['model']."</p>";
              echo "</div>";
              echo "<p class='km'>".$carDeal['kilometers']." km</p>";
              echo "<p class='year'>".$carDeal['year']."</p>";
              echo "<p class='price'>".$carDeal['price']." €</p>";
              echo "</div>";
            }
        ?>

      </div>
    </section>
  </main>

  <div id="modal-connect" class="modal">
    <a href="#" class="outside"></a>
    <div id="target-inner">
      <div class="modal-form">
        <a href="#" class="close">&times;</a>
        <h2>Contacter le garage</h2>
        <form action="action_page.php" class="">

          <label for="login">Login</label>
          <input type="text" id="login" name="login" placeholder="Votre mail">
      
          <label for="password">Mot de passe</label>
          <input type="password" id="password" name="password" placeholder="Votre mot de passe">
      
          <input type="submit" value="Se connecter" class="like-button">
      
        </form>
      </div>
    </div>
  </div>

  <div id="modal-contact" class="modal">
    <a href="#" class="outside"></a>
    <div id="target-inner">
      <div class="modal-form">
        <a href="#" class="close">&times;</a>
        <h2>Contacter le garage</h2>
        <form action="action_page.php" class="">

          <label for="name">Nom et prénom</label>
          <input type="text" id="name" name="firstname" placeholder="Votre nom">
      
          <label for="mail">Mail</label>
          <input type="text" id="mail" name="mail" placeholder="Votre mail">

          <label for="tel">Numéro de téléphone</label>
          <input type="text" id="tel" name="tel" placeholder="Votre numéro de téléphone">
      
          <label for="message">Message</label>
          <textarea id="message" name="message" placeholder="Votre message" style="height:200px"></textarea>
      
          <input type="submit" value="Envoyer" class="like-button">
      
        </form>
      </div>
    </div>
  </div>

  <div id="modal-comment" class="modal">
    <a href="#" class="outside"></a>
    <div id="target-inner">
      <div class="modal-form">
        <a href="#" class="close">&times;</a>
        <h2>Ajouter un commentaire</h2>
        <form action="action_page.php" class="">

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
</body>
</html>