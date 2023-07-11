<?php require_once 'functions.php';
$PDO = DBconnect();
global $PDO;

$formServices_send = false;
$formServices_error = false;
$formServices_message = "";

  if ( isset($_POST['formAdd']) ) {
    $formServices_send = true;
    $formServices_error = false;
    
    $serviceText = $_POST['add-service-input'];
    echo $serviceText;

    $query = "INSERT INTO services (text) VALUES (:text_service)";
    $PDOstmt = $PDO->prepare($query);
    $PDOstmt->bindValue(':text_service', $serviceText);
    
    if ( !$PDOstmt->execute() ) {
      echo 'ici';
      $formServices_error = true;
      $formServices_message = '<p class="form-fail">Erreur de formulaire.</p>';
    }
    echo 'là';
  }

  if( $formServices_send && !$formServices_error ) {
    echo '<script>window.location="admin.php"</script>';
  }
  
  DBdisconnect();

?>
