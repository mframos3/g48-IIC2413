<?php   
    require("../config/conexionv2_grupo49.php");
    session_start();
    $current_user = $_SESSION['current_user_id'];
    $query = "SELECT *
              FROM Habitaciones WHERE habid NOT IN 
              (SELECT habid FROM Reservas) ";
    $result = $db -> prepare($query);
	$result -> execute();
    $habitaciones = $result -> fetchAll();
    if (sizeof($habitaciones) > 0) {
    ?>

<table>
    <tr>
      <th>Id de la habitacion</th>
      <th>Nombre de la habitacion</th>
      <th> Id del hotel </th>
      <th>Precio</th>
    </tr>
  <?php
	foreach ($data as $p) {
      echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td><td>$p[3]</td></tr>";
    }
}
    else{
        echo "<h3>No hay habitaciones disponibles</h3>";
    }
  ?>
    </table> 
<br>

<a href="../views/reserve_room.php"> Pedir una habitacion</a>