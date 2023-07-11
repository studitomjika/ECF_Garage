<?php require_once 'functions.php';
$PDO = DBconnect();
global $PDO;

$results = $PDO->query('SELECT * FROM services');
$services = [];
while ($row = $results->fetchArray()) {
  array_push($services, $row);
}

DBdisconnect();

echo '<h1>page admin V. Parrot</h1>';
echo '<h2>Editer les services</h2>';

echo '<table>';
echo '<tr>';
echo '<th>id</th>';
echo '<th>Service</th>';
echo '<th>Update</th>';
echo '<th>Delete</th>';
echo '</tr>';

foreach ($services as $service) {
  echo '<tr>';
  echo '<td>'.$service['id_service'].'</td>';
  echo '<td>'.$service['text'].'</td>';
  echo '<td><button type="button">Update</button></td>';
  echo '<td><button type="button">Delete</button></td>';
  echo '</tr>';
}
echo '<tr>';
echo '<td colspan="2"><input type=text id="new-service"></td>';
echo '<td colspan="2"><button type="button" id="add-service-btn">Add</button></td>';
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
</style>

<body>
  
</body>
</html>

<form id="servicesForm" name="servicesForm" action="services.php" method="post">
  <input name="formAdd" value="1">
  <!--<input action-service="add" value="1">-->
  <input id="add-service-input" name="add-service-input" type="text" value="">
  <!--<input id="add" value="1">-->
</form>
<?php /* include "services.php"; */ ?>

<script src="services.js" type="text/javascript"></script>
</body>
</html>


<!--listez les sevices dans un tableau avec bouton pour supprimez,
un champ + bouton pour ajouter un service
une action = un formuaire-->
