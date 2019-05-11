<?php
    require("../config/conexion_grupo48.php");
    $query = "SELECT pnombre, snombre 
              FROM Parques, Senderos
              WHERE Parques.pid = Senderos.pid
         ";
	$result = $db -> prepare($query);
	$result -> execute();
	$data = $result -> fetchAll();
?>

  <h3>Parques y sus senderos</h3>
  <table>
    <tr>
      <th>Nombre del parque</th>
      <th>Nombre del sendero</th>
    </tr>
  <?php
	foreach ($data as $p) {
      echo "<tr><td>$p[0]</td><td>$p[1]</td></tr>";
	}
  ?>
    </table> 
<?php
    $query = "SELECT pnombre, anombre 
              FROM Parques, Atractivos
              WHERE Parques.pid = Atractivos.pid
         ";
	$result = $db -> prepare($query);
	$result -> execute();
	$data = $result -> fetchAll();
?>

  <h3>Parques y sus atractivos</h3>
  <table>
    <tr>
      <th>Nombre del parque</th>
      <th>Nombre del atractivo</th>
    </tr>
  <?php
	foreach ($data as $p) {
      echo "<tr><td>$p[0]</td><td>$p[1]</td></tr>";
	}
  ?>
	</table> 
  
<?php include('../templates/footer.html'); ?>