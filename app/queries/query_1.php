<?php include('template/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $uid = intval($_POST["uid"]);
  $query = "SELECT S.sid, snombre, largo, duracion, dificultad 
            FROM Registros R, Senderos S 
            WHERE R.uid = $uid AND R.sid = S.sid";

	$result = $db -> prepare($query);
	$result -> execute();
	$senderos = $result -> fetchAll();
?>
  
  <h3>Senderos Realizados por el Usuario con ID <?php echo $uid ?> </h3>
  <table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Largo</th>
      <th>Duración</th>
      <th>Dificultad</th>
    </tr>
  <?php
	foreach ($senderos as $p) {
      echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td>
      <td>$p[3]</td><td>$p[4]</td></tr>";
	}
  ?>
  </table>

<?php include('../templates/footer.html'); ?>
