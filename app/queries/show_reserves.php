<?php include('../templates/header.html');   ?>

<body>
    <section id="banner">
        <h2><strong>Reservas</strong>
        <br/></h2>
    </section>

<?php require_once ("../config/conexion_grupo49.php"); $conexion=conectarBD();?>
<?php
$uid = 1; #Después poner el usuario actual aquí
$query = "SELECT R.fecha_inicio, R.fecha_fin, O.nombre_hotel, H.nombre_habitacion, H.precio
          FROM Habitaciones H, Reservas R, Hoteles O
          WHERE R.uid = $uid AND R.habid = H.habid AND H.hid = O.hid";
$result = pg_query($conexion, $query) or die ("Error en la consulta!");
$nr = pg_num_rows($result);
if ($nr>0) {
    echo "<div class='table-wrapper'>
          <table>
            <thead>
            <tr><th>Fecha Inicial</th>
            <th>Fecha Final</th>
            <th>Hotel</th>
            <th>Habitación</th>
            <th>Precio</th></tr>
            </thead>";
  echo "<tbody>";
        while($filas = pg_fetch_array($result)) {
            echo "<tr><td>".$filas["fecha_inicio"]."</td>";
            echo "<td>".$filas["fecha_fin"]."</td>";
            echo "<td>".$filas["nombre_hotel"]."</td>";
            echo "<td>".$filas["nombre_habitacion"]."</td>";
            echo "<td>".$filas["precio"]."</td></tr>";
            } echo "</tbody></table></div>";
} else {echo "No hay datos!";}
?>

<br><br>
  <div class="12u$">
      <ul class="actions">
          <form action="../views/profile.php" method="post">
            <input type="submit" value="Volver">
      </ul>
  </div>
  </form>
</body>
