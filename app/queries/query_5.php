<?php include('template/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $query = "SELECT U.uid, U.unombre, U.fecha_nac, U.correo, U.nacionalidad
            FROM Registros R, Usuarios U, Senderos S
            WHERE R.uid = U.uid AND R.estado = 'en ruta'
            AND R.sid = S.sid AND S.largo >= ALL (SELECT largo FROM Senderos)";
	$result = $db -> prepare($query);
	$result -> execute();
	$user_in_route = $result -> fetchAll();
  ?>
  
  <h3>Usuarios en Ruta en el Sendero Más Largo</h3>
  <table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Fecha de Nacimiento</th>
      <th>Correo</th>
      <th>Nacionalidad</th>
    </tr>
  <?php
	foreach ($user_in_route as $p) {
      echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td>
      <td>$p[3]</td><td>$p[4]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
