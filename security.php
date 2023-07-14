<?php
  session_start();
  if (!isset($_SESSION['id_user'])) {
    
    echo '<script>window.location="index.php"</script>';
    exit();
  }
?>
