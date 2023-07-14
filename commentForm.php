<?php

$formComment_send = false;
$formComment_error = false;
$formComment_message = "";

  if ( isset($_POST['formComment']) ) {
    $formComment_send = true;
    $formComment_error = false;

    $name = $_POST['name'];
    $message = $_POST['message'];
    $note = $_POST['note'];

    $query = "INSERT INTO comments (message, grade, name) VALUES (:message, :note, :name)";
    $PDOstmt = $PDO->prepare($query);
    $PDOstmt->bindValue(':name', $name);
    $PDOstmt->bindValue(':message', $message);
    $PDOstmt->bindValue(':note', $note);

    if ( !$PDOstmt->execute() ) {
      $formComment_error = true;
      $formComment_message = '<p class="form-fail">Erreur de formulaire.</p>';
    }
  }

  if( $formComment_send && !$formComment_error ) {
    echo '<div id="modal-comment-success" class="modal show"><div>';
    echo '<div class="modal-form">';
    echo '<a class="close close-modal-onclick">&times;</a>';
    echo '<p class="form-success">Formulaire envoyé.</p>';
    echo '</div></div></div>';
  }
?>

<div id="modal-comment" class="modal<?php if( $formComment_send && $formComment_error ) { echo ' show'; } ?>">
    <div>
      <div class="modal-form">
        <a class="close close-modal-onclick">&times;</a>
        <h2><?= $CONFIGS['titre_form_comment']; ?></h2>

        <form action="index.php" method="post">
          <input type="hidden" name="formComment" value=1>

          <label for="name">Nom</label>
          <input type="text" required id="name" name="name" placeholder="Votre nom"  value="<?php if( $formComment_error ) { echo $_POST['name']; } ?>">
      
          <label for="message">Message</label>
          <textarea id="message" required name="message" placeholder="Votre commentaire" style="height:200px"><?php if( $formComment_error ) { echo $_POST['message']; } ?></textarea>
      
          <label for="note">Note</label>
          <div class="flex row note-radio">
            <div>
              <input type="radio" required id="note-1" name="note" value="1" <?php if( $formComment_error && $_POST['note'] == '1') { echo 'checked'; } ?>>
              <label for="note-1">1</label>
            </div>
            <div>
              <input type="radio" required id="note-2" name="note" value="2" <?php if( $formComment_error && $_POST['note'] == '2') { echo 'checked'; } ?>>
              <label for="note-2">2</label>
            </div>
            <div>
              <input type="radio" required id="note-3" name="note" value="3" <?php if( $formComment_error && $_POST['note'] == '3') { echo 'checked'; } ?>>
              <label for="note-3">3</label>
            </div>
            <div>
              <input type="radio" required id="note-4" name="note" value="4" <?php if( $formComment_error && $_POST['note'] == '4') { echo 'checked'; } ?>>
              <label for="note-4">4</label>
            </div>
            <div>
              <input type="radio" required id="note-5" name="note" value="5" <?php if( $formComment_error && $_POST['note'] == '5') { echo 'checked'; } ?>>
              <label for="note-5">5</label>
            </div>
          </div>

          <?php
            if ( !empty($formComment_message) ) {
              echo '<p>'.$formComment_message.'</p>';
            }
          ?>

          <input type="submit" value="Envoyer" class="like-button">
      
        </form>
      </div>
    </div>
  </div>