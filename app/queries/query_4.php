<?php include('template/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $query = "SELECT A.vnombre, O.vino_nombre, O.cepa, O.vino_descripcion, O.vprecio
            FROM Vinas A, Vinos O
            WHERE A.vid = O.vid AND O.vprecio >= ALL (SELECT vprecio FROM Vinos)";
	$result = $db -> prepare($query);
	$result -> execute();
	$winedata = $result -> fetchAll();
?>

  <h3>Vino Más Caro</h3>
  <table>
    <tr>
      <th>Viña</th>
      <th>Nombre</th>
      <th>Cepa</th>
      <th>Descripción</th>
      <th>Precio</th>
    </tr>
  <?php
	foreach ($winedata as $p) {
      echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td>
      <td>$p[3]</td><td>$p[4]</td</tr>";
	}
  ?>
	</table> 
  
<?php include('../templates/footer.html'); ?>
