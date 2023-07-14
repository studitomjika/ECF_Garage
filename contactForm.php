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
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $id_car_deal = $_POST['id_car_deal'];

    $query = "INSERT INTO messages (name, email, phone_number, subject, message, id_occasion) VALUES (:firstname, :mail, :tel, :subject, :message, :id_car_deal)";
    $PDOstmt = $PDO->prepare($query);
    $PDOstmt->bindValue(':firstname', $firstname);
    $PDOstmt->bindValue(':mail', $mail);
    $PDOstmt->bindValue(':tel', $tel);
    $PDOstmt->bindValue(':subject', $subject);
    $PDOstmt->bindValue(':message', $message);
    $PDOstmt->bindValue(':id_car_deal', (int)$id_car_deal);

    if ( !$PDOstmt->execute() ) {
      $formContact_error = true;
      $formContact_message = '<p class="form-fail">Erreur de formulaire.</p>';
    }
  }

  if( $formContact_send && !$formContact_error ) {
    echo '<div id="modal-contact-success" class="modal show"><div>';
    echo '<div class="modal-form">';
    echo '<a class="close close-modal-onclick">&times;</a>';
    echo '<p class="form-success">Formulaire envoyé.</p>';
    echo '</div></div></div>';
  }
?>

<div id="modal-contact" class="modal<?php if( $formContact_send && $formContact_error ) { echo ' show'; } ?>">
<div>
  <div class="modal-form">
    <a class="close close-modal-onclick">&times;</a>
    <h2><?= $CONFIGS['titre_form_contact']; ?></h2>

    <form action="index.php" method="post">
      <input type="hidden" name="formContact" value=1>

      <label for="name">Nom et prénom</label>
      <input type="text" id="firstname" name="firstname" placeholder="Votre nom" value="<?php if( $formContact_error ) { echo $_POST['firstname']; } ?>">
      
      <label for="mail">Mail</label>
      <input type="email" id="mail" name="mail" placeholder="Votre mail" value="<?php if( $formContact_error ) { echo $_POST['mail']; } ?>">

      <label for="tel">Numéro de téléphone</label>
      <input type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" id="tel" name="tel" placeholder="Votre numéro de téléphone" value="<?php if( $formContact_error) { echo $_POST['tel']; } ?>">
  
      <label for="subject">Sujet</label>
      <input type="text" required id="subject" name="subject" placeholder="Sujet du message" value="<?php if( $formContact_error ) { echo $_POST['subject']; } ?>">
      <input type="hidden" id="id_car_deal" name="id_car_deal" value="<?php echo $_POST['id_car_deal']; ?>">

      <label for="message">Message</label>
      <textarea required id="message" name="message" placeholder="Votre message" style="height:200px"><?php if( $formContact_error ) { echo $_POST['message']; } ?></textarea>
  
      <?php
        if ( !empty($formContact_message) ) {
          echo '<p>'.$formContact_message.'</p>';
        }
      ?>

      <input type="submit" value="Envoyer" class="like-button">
  
    </form>
  </div>
</div>
</div>
