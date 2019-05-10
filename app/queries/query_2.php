<?php include('template/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $rid = intval($_POST["rid"]);
  $parks_query = "SELECT pnombre FROM Parques WHERE rid = $rid";
  $vineyards_query = "SELECT vnombre FROM Vinas WHERE rid = $rid";
	$result = $db -> prepare($parks_query);
	$result -> execute();
	$parks = $result -> fetchAll();
  ?>

  <h3>Parques de la Región con ID <?php echo $rid ?> </h3>
  <table>
    <tr>
      <th>Nombre</th>
    </tr>
  
<?php
	foreach ($parks as $p) {
  		echo "<tr><td>$p[0]</td></tr>";
	}
?>
	</table>

<?php
  $result = $db -> prepare($vineyards_query);
	$result -> execute();
	$vineyards = $result -> fetchAll();
?>

  <h3>Viñas de la Región con ID <?php echo $rid ?></h3>
  <table>
    <tr>
      <th>Nombre</th>
    </tr>

<?php 
    foreach ($vineyards as $p){
        echo "<tr><td>$p[0]</td></tr>";
    }
?>
    </table>

<?php include('../templates/footer.html'); ?>
