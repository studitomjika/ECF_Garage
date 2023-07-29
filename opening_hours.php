<?php
require_once 'security.php';
require_once 'functions.php';

$PDO = DBconnect();
global $PDO;

$formHours_send = false;
$formHours_error = false;
$formHours_message = "";

  if ( isset($_POST['formUpdate']) ) {
    $formHours_send = true;
    $formHours_error = false;
    
    $hoursText = $_POST['update-hours-input'];
    $hoursId = $_POST['update-hours-id'];

    $query = "UPDATE openings_hours SET hours = :hours_text WHERE id_opening_hours=:hours_id";
    
    $PDOstmt = $PDO->prepare($query);
    $PDOstmt->bindValue(':hours_text', $hoursText);
    $PDOstmt->bindValue(':hours_id', $hoursId);
  
    if ( !$PDOstmt->execute() ) {
      $formHours_error = true;
      $formHours_message = '<p class="form-fail">Erreur de formulaire.</p>';
    }
  }
  
  if( $formHours_send && !$formHours_error ) {
    echo '<script>window.location="admin.php"</script>';
  }
  
  DBdisconnect();

?>
