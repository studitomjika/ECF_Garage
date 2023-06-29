<?php

  $sqlite = 'sqlite:Garage.db';
  try {
    $pdo = new PDO($sqlite);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();}

?>