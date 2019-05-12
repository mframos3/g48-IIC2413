<?php

    require("../config/conexion_grupo49.php");
    session_start();
    $uid = intval($_SESSION['current_user_id']);
    $query = "SELECT R.nombre_restaurant, R.direccion, R.descripcion_restaurant
             FROM Restaurantes AS R, RestaurantesFavoritos AS RF 
             WHERE R.restid = RF.restid AND RF.uid = $uid";
    $result = $db -> prepare($query);
	$result -> execute();
    $response = $result -> fetchAll();
?>

<h3>Tus Restaurantes favoritos</h3>
  <table>
    <tr>
      <th>Nombre</th>
      <th>Direccion</th>
      <th>Descripcion</th>
    </tr>
  
<?php
	foreach ($response as $p) {
  		echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td></tr>";
	}
?>
	</table>


<a href="../views/favourites_restaurants.php">Volver</a>
