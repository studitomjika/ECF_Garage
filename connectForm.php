<?php

$formConnect_send = false;
$formConnect_error = false;
$formConnect_message = "";

  if ( isset($_POST['formConnect']) ) {
    
    $formConnect_send = true;
    $formConnect_error = false;
    
    $email = $_POST['login'];
    $password = $_POST['password'];

    $query = "SELECT * FROM employees WHERE login = :email";
    $PDOstmt = $PDO->prepare($query);
    $PDOstmt->bindValue(':email', $email);
    
    $result = $PDOstmt->execute();

    if( !$result ) {
      $formConnect_error = true;
      $formConnect_message = '<p class="form-fail">Erreur technique.</p>';
    } else {
      $user = $result->fetchArray(SQLITE3_ASSOC);

      if ( !$user || !password_verify($password, $user['password'])) {
        $formConnect_error = true;
        $formConnect_message = '<p class="form-fail">Identifiants erronés.</p>';
      } else {
        $_SESSION["id_user"] = $user["id_employee"];
      }
    }
  }

  if( $formConnect_send && !$formConnect_error ) {
    echo '<script>window.location="index.php"</script>';
  }
  
?>

<div id="modal-connect" class="modal<?php if( $formConnect_send && $formConnect_error) { echo ' show'; } ?>">
  <div>
    <div class="modal-form">
      <a class="close close-modal-onclick">&times;</a>
      <h2><?= $CONFIGS['titre_form_connect']; ?></h2>

      <form action="index.php" method="post">
        <input type="hidden" name="formConnect" value=1>

        <label for="login">Login</label>
        <input type="email" required id="login" name="login" placeholder="Votre mail">
    
        <label for="password">Mot de passe</label>
        <input type="password" required id="password" name="password" placeholder="Votre mot de passe">
    
        <?php
          if ( !empty($formConnect_message) ) {
            echo $formConnect_message;
          }
        ?>

        <input type="submit" value="Se connecter" class="like-button">
    
      </form>
    </div>
  </div>
</div>
