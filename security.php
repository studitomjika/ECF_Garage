<?php

  /*ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  echo 'session return: '.session_start();
  var_dump($_SESSION);
  echo $_SESSION['id_user'];*/
  
  session_start();
  if (!isset($_SESSION['id_user'])) {
    
    echo '<script>window.location="index.php"</script>';
    exit(); //fin d'évaluation du script
  }
?>
