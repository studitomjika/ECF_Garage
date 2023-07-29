<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  require_once 'security.php';
  require_once 'functions.php';
  $PDO = DBconnect();
  global $PDO;

  $results = $PDO->query('SELECT * FROM services');
  $services = [];
  while ($row = $results->fetchArray()) {
    array_push($services, $row);
  }

  $results = $PDO->query('SELECT * FROM openings_hours');
  $opening_hours = [];
  while ($row = $results->fetchArray()) {
    array_push($opening_hours, $row);
  }

  DBdisconnect();

  echo '<h1>page admin V. Parrot</h1>';
  echo '<h2>Editer les services</h2>';

  echo '<table>';
  echo '<tr>';
  echo '<th>id</th>';
  echo '<th>Service</th>';
  echo '<th>Update</th>';
  echo '<th>Validate</th>';
  echo '<th>Delete</th>';
  echo '</tr>';

  foreach ($services as $service) { ?>
    <tr>
      <td><?=$service['id_service']?></td>
      <td><input type="text" id="service-text-<?=$service['id_service']?>" class="update-input input-readonly" disabled value="<?=$service['text']?>"/></td>
      <td><button type="button" name="update-service-btn" id="update-service-btn-<?=$service['id_service']?>">Update</button></td>
      <td><button type="button" name="validate-service-btn" id="validate-service-btn-<?=$service['id_service']?>" class="update-input" disabled>Validate</button></td>
      <td><button type="button" name="delete-service-btn" id="delete-service-btn-<?=$service['id_service']?>">Delete</button></td>
    </tr>
  <?php }
  echo '<tr>';
  echo '<td colspan="2"><input type=text id="new-service"></td>';
  echo '<td colspan="3"><button type="button" id="add-service-btn">Add</button></td>';
  echo '</tr>';
  echo '</table>';

  echo '<h2>Editer les horaires</h2>';

  echo '<table>';
  echo '<tr>';
  echo '<th>Jour</th>';
  echo '<th>Horaires</th>';
  echo '<th>Update</th>';
  echo '<th>Validate</th>';
  echo '</tr>';

  foreach ($opening_hours as $opening_hour) { ?>
    <tr>
      <td><?=$opening_hour['day']?></td>
      <td><input type="text" id="hours-text-<?=$opening_hour['id_opening_hours']?>" class="update-input input-readonly" disabled value="<?=$opening_hour['hours']?>"/></td>
      <td><button type="button" name="update-hours-btn" id="update-hours-btn-<?=$opening_hour['id_opening_hours']?>">Update</button></td>
      <td><button type="button" name="validate-hours-btn" id="validate-hours-btn-<?=$opening_hour['id_opening_hours']?>" class="update-input" disabled>Validate</button></td>
    </tr>
  <?php }
  echo '<tr>';
  echo '</tr>';
  echo '</table>';
?>

<!DOCTYPE html>
<html lang="en">

<style>
table, th, td {
  border:1px solid black;
  border-collapse: collapse;
}
form {
  display: none;
}
.input-readonly {
  color: black;
  border: none;
}
</style>

<body>
  
</body>
</html>

<form id="servicesFormAdd" name="servicesFormAdd" action="services.php" method="post">
  <input type="hidden" name="formAdd" value="1">
  <input id="add-service-input" name="add-service-input" type="hidden" value="">
</form>

<form id="servicesFormUpdate" name="servicesFormUpdate" action="services.php" method="post">
  <input type="hidden" name="formUpdate" value="1">
  <input id="update-service-input" name="update-service-input" type="hidden" value="">
  <input id="update-service-id" name="update-service-id" type="hidden" value="">
</form>

<form id="servicesFormDelete" name="servicesFormDelete" action="services.php" method="post">
  <input type="hidden" name="formDelete" value="1">
  <input id="delete-service-input" name="delete-service-input" type="hidden" value="">
</form>

<script src="services.js" type="text/javascript"></script>


<form id="hoursFormUpdate" name="hoursFormUpdate" action="opening_hours.php" method="post">
  <input type="hidden" name="formUpdate" value="1">
  <input id="update-hours-input" name="update-hours-input" type="hidden" value="">
  <input id="update-hours-id" name="update-hours-id" type="hidden" value="">
</form>

<script src="opening_hours.js" type="text/javascript"></script>

</body>
</html>
