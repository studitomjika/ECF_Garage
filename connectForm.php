<?php

$formConnect_send = false;
$formConnect_error = false;
$formConnect_message = "";

if ( isset($_GET['formConnect']) ) {
  $formConnect_send = true;
  $formConnect_error = false;

  $email = $_GET['email'];
  $password = $_GET['password'];

  /*test verification data*/

  /*test verification data*/
  /*$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $inputs['email'] = $email;

  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
  $inputs['password'] = $password;*/

  $query = "SELECT * FROM employees WHERE login = :mail";
  $PDOstmt = $PDO->prepare($query);
  $PDOstmt->bindValue(':mail', $mail);

  if ( $PDOstmt->execute() ) {
    $formConnect_message = '<p class="form-success"> Formulaire envoyé.</p>';

    $user = $statement->fetch(PDO::FETCH_ASSOC);
    if ($user === false) {
        // Si aucun utilisateur ne correspond au login entré, on affiche une erreur
        alert( 'Identifiants invalides');
    } else {
        // On vérifie le hash du password
        if (password_verify('$password', $user['password'])) {
          alert( 'Bienvenue '.$user['firstname']);
        } else {
          alert( 'Identifiants invalides');
        }
    }
  }
  else {
    $formConnect_message = '<p class="form-fail">Erreur de formulaire.</p>';
    alert('Impossible de récupérer l\'utilisateur');
  }
}

?>

<div id="modal-connect" class="modal<?php if( $formConnect_send ) { echo ' show'; } ?>">
    <div>
      <div class="modal-form">
        <a class="close close-modal-onclick">&times;</a>
        <h2><?= $CONFIGS['titre_form_connect']; ?></h2>
        <form action="index.php" method="post">

          <label for="login">Login</label>
          <input type="email" required id="login" name="login" placeholder="Votre mail">
      
          <label for="password">Mot de passe</label>
          <input type="password" required id="password" name="password" placeholder="Votre mot de passe">
      
          <?php
            if ( !empty($formConnect_message) ) {
              echo $formConnect_message;
            }
          ?>

          <input type="submit" value="Se connecter" class="like-button">
      
        </form>
      </div>
    </div>
  </div>