<?php
require_once 'security.php';
require_once 'functions.php';

$PDO = DBconnect();
global $PDO;

$formComments_send = false;
$formComments_error = false;
$formComments_message = "";

  if ( isset($_POST['formUpdate']) ) {
    $formComments_send = true;
    $formComments_error = false;
    
    $acceptedComment = $_POST['update-comment-input'];
    $commentId = $_POST['update-comment-id'];

    $query = "UPDATE comments SET accepted = :is_accepted WHERE id_commentaire=:comment_id";
    
    $PDOstmt = $PDO->prepare($query);
    $PDOstmt->bindValue(':is_accepted', $acceptedComment);
    $PDOstmt->bindValue(':comment_id', $commentId);
  
    if ( !$PDOstmt->execute() ) {
      $formComments_error = true;
      $formComments_message = '<p class="form-fail">Erreur de formulaire.</p>';
    }
  }
  
  if( $formComments_send && !$formComments_error ) {
    echo '<script>window.location="admin.php"</script>';
  }
  
  DBdisconnect();

?>
