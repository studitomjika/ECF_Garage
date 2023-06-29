<?php

$formContact_send = false;
$formContact_error = false;
$formContact_message = false;

if ( isset($_GET['formContact']) ) {
  $formContact_send = true;
  $formContact_error = false;

  $firstname = $_GET['firstname'];
  $mail = $_GET['mail'];
  $tel = $_GET['tel'];
  $message = $_GET['message'];

  /*test verification data*/

  $test_insert = true;
  //https://stackoverflow.com/questions/15091734/how-to-escape-strings-in-pdo
  //$test = $PDO->query('INSERT firstname, $firstname mail, tel, message INTO Message '); 

  if ( $test_insert ) {
    $formContact_message = 'Formulaire envoyé';
  }
  else {

    $formContact_message = 'Erreur formulaire';
  }
}

?>

<div id="modal-contact" class="modal<?php if( $formContact_send ) { echo ' show'; } ?>">
<div>
  <div class="modal-form">
    <a class="close close-modal-onclick">&times;</a>
    <h2>Contacter le garage</h2>
<?php
    if ( !empty($formContact_message) ) {
      echo '<p>'.$formContact_message.'</p>';
    }
?>
    <form action="index.php" method="get"><!--TODO post en prod-->
      <input type="hidden" name="formContact" value=1><!--pour vérifier que le form est bien envoyé-->

      <label for="name">Nom et prénom</label>
      <input type="text" id="firstname" name="firstname" placeholder="Votre nom" value="<?php if( isset($_GET['firstname']) ) { echo $_GET['firstname']; } ?>">
  
      <label for="mail">Mail</label>
      <input type="text" id="mail" name="mail" placeholder="Votre mail" value="<?php if( isset($_GET['mail']) ) { echo $_GET['mail']; } ?>">

      <label for="tel">Numéro de téléphone</label>
      <input type="text" id="tel" name="tel" placeholder="Votre numéro de téléphone" value="<?php if( isset($_GET['tel']) ) { echo $_GET['tel']; } ?>">
  
      <label for="message">Message</label>
      <textarea id="message" name="message" placeholder="Votre message" style="height:200px" value="<?php if( isset($_GET['message']) ) { echo $_GET['message']; } ?>"></textarea>
  
      <input type="submit" value="Envoyer" class="like-button">
  
    </form>
  </div>
</div>
</div>

<?php