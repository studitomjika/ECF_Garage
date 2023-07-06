<?php

$formContact_send = false;
$formContact_error = false;
$formContact_message = "";

if ( isset($_POST['formContact']) ) {
  $formContact_send = true;
  $formContact_error = false;

  $firstname = $_POST['firstname'];
  $mail = $_POST['mail'];
  $tel = $_POST['tel'];
  $message = $_POST['message'];

  /*test verification data*/
  /*$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
  $inputs['firstname'] = $firstname;

  $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);
  $inputs['mail'] = $mail;

  $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_INT);
  $inputs['tel'] = $tel;

  $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
  $inputs['message'] = $message;*/

  $query = "INSERT INTO messages (name, email, phone_number, message) VALUES (:firstname, :mail, :tel, :message)";
  $PDOstmt = $PDO->prepare($query);
  $PDOstmt->bindValue(':firstname', $firstname);
  $PDOstmt->bindValue(':mail', $mail);
  $PDOstmt->bindValue(':tel', $tel);
  $PDOstmt->bindValue(':message', $message);

  if ( $PDOstmt->execute() ) {
    $formContact_message = '<p class="form-success"> Formulaire envoyé.</p>';
  }
  else {
    $formContact_message = '<p class="form-fail">Erreur de formulaire.</p>';
  }
}

?>

<div id="modal-contact" class="modal<?php if( $formContact_send ) { echo ' show'; } ?>">
<div>
  <div class="modal-form">
    <a class="close close-modal-onclick">&times;</a>
    <h2><?= $CONFIGS['titre_form_contact']; ?></h2>

    <form action="index.php" method="post"><!--TODO post en prod-->
      <input type="hidden" name="formContact" value=1><!--pour vérifier que le form est bien envoyé-->

      <label for="name">Nom et prénom</label>
      <input type="text" id="firstname" name="firstname" placeholder="Votre nom" value="<?php if( isset($_POST['firstname']) ) { echo $_POST['firstname']; } ?>">
      
      <label for="mail">Mail</label>
      <input type="email" id="mail" name="mail" placeholder="Votre mail" value="<?php if( isset($_POST['mail']) ) { echo $_POST['mail']; } ?>">

      <label for="tel">Numéro de téléphone</label>
      <input type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" id="tel" name="tel" placeholder="Votre numéro de téléphone" value="<?php if( isset($_POST['tel']) ) { echo $_POST['tel']; } ?>">
  
      <label for="message">Message</label>
      <textarea required id="message" name="message" placeholder="Votre message" style="height:200px"><?php if( isset($_POST['message']) ) { echo $_POST['message']; } ?></textarea>
  
      <?php
        if ( !empty($formContact_message) ) {
          echo $formContact_message;
        }
      ?>

      <input type="submit" value="Envoyer" class="like-button">
  
    </form>
  </div>
</div>
</div>

<?php