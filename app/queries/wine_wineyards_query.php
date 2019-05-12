<?php
    require("../config/conexion_grupo48.php");
    $query = "SELECT B.vnombre,B.rid, A.vino_nombre FROM Vinos A ,Vinas B WHERE A.vid = B.vid
         ";
	$result = $db -> prepare($query);
	$result -> execute();
	$data = $result -> fetchAll();
?>

  <h3>Vinos y Vi&ntilde;os</h3>
  <table>
    <tr>
      <th>Vi&ntilde;a</th>
      <th>Región</th>
      <th>Nombre del vino</th>
    </tr>
  <?php
	foreach ($data as $p) {
      echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td></tr>";
	}
  ?>
	</table> 
  
<?php include('../templates/footer.html'); ?>
