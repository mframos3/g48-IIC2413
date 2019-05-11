<?php include('template/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $id_parque = intval($_POST["id_parque"]);
  $query = "SELECT (SELECT pnombre FROM Parques WHERE pid = $id_parque), Count(*), Sum(S.largo) 
            FROM Senderos S
            WHERE S.pid = $id_parque 
            GROUP BY S.pid";

	$result = $db -> prepare($query);
	$result -> execute();
  $park_info = $result -> fetchAll();
?>
  
  <h3>Senderos y Kilómetros De Recorrido Del Parque Con ID <?php echo $id_parque ?></h3>
  <table>
    <tr>
      <th>Nombre</th>
      <th>N° De Senderos</th>
      <th>Distancia Total</th>
    </tr>
  
<?php 
  foreach ($park_info as $p) {
    echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td></tr>";
  }
?>
  </table>

<?php include('../templates/footer.html'); ?>
