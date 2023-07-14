<?php
require_once 'security.php';
require_once 'functions.php';

$PDO = DBconnect();
global $PDO;

$formServices_send = false;
$formServices_error = false;
$formServices_message = "";

  if ( isset($_POST['formAdd']) ) {
    $formServices_send = true;
    $formServices_error = false;
    
    $serviceText = $_POST['add-service-input'];

    $query = "INSERT INTO services (text) VALUES (:text_service)";
    
    $PDOstmt = $PDO->prepare($query);
    $PDOstmt->bindValue(':text_service', $serviceText);
  
    if ( !$PDOstmt->execute() ) {
      $formServices_error = true;
      $formServices_message = '<p class="form-fail">Erreur de formulaire.</p>';
    }
  }

  if ( isset($_POST['formDelete']) ) {
    $formServices_send = true;
    $formServices_error = false;
    
    $serviceId = $_POST['delete-service-input'];

    $query = "DELETE FROM services WHERE id_service=:service_id";
    
    $PDOstmt = $PDO->prepare($query);
    $PDOstmt->bindValue(':service_id', $serviceId);
  
    if ( !$PDOstmt->execute() ) {
      $formServices_error = true;
      $formServices_message = '<p class="form-fail">Erreur de formulaire.</p>';
    }
  }

  if ( isset($_POST['formUpdate']) ) {
    $formServices_send = true;
    $formServices_error = false;
    
    $serviceText = $_POST['update-service-input'];
    $serviceId = $_POST['update-service-id'];

    $query = "UPDATE services SET text = :service_text WHERE id_service=:service_id";
    
    $PDOstmt = $PDO->prepare($query);
    $PDOstmt->bindValue(':service_text', $serviceText);
    $PDOstmt->bindValue(':service_id', $serviceId);
  
    if ( !$PDOstmt->execute() ) {
      $formServices_error = true;
      $formServices_message = '<p class="form-fail">Erreur de formulaire.</p>';
    }
  }
  
  if( $formServices_send && !$formServices_error ) {
    echo '<script>window.location="admin.php"</script>';
  }
  
  DBdisconnect();

?>
