<?php include('../templates/header.html');   ?>

<body>
    <section id="banner">
        <h2><strong>Habitaciones</strong>
        <br/></h2>
    </section>
<?php require_once ("../config/conexion_grupo49.php"); $conexion = conectarBD();?>
<?php
session_start();
$hid = $_GET["hid"];
$query = "SELECT habid, nombre_habitacion, precio FROM Habitaciones WHERE hid = $hid";
$resultado=pg_query($conexion, $query) or die ("Error en la consulta");
$nr=pg_num_rows($resultado);
if ($nr>0) {
    if (isset($_SESSION["current_user_id"])) {
        echo "<div class='table-wrapper'>
          <table>
            <thead>
            <tr><th>Nombre Habitación</th>
            <th>Precio</th>
            <th>Reservar Habitación</th></tr>
            </thead>";
    } else {
        echo "<div class='table-wrapper'>
          <table>
            <thead>
            <tr><th>Nombre Habitación</th>
            <th>Precio</th></tr>
            </thead>";
    }
  echo "<tbody>";
        while($filas = pg_fetch_array($resultado)) {
            echo "<tr><td>".$filas["nombre_habitacion"]."</td>";
            echo "<td>".$filas["precio"]."</td>";
            if (isset($_SESSION["current_user_id"])) {
                echo "<td><a href=../views/reserve_room.php?habid=",$filas["habid"],">"."Reservar"."</a></td>"."</tr>";
            }
            } echo "</tbody></table></div>";
} else {echo "No hay datos";}
?>
<br><br>
    <div class="12u$">
      <ul class="actions">
          <form action="show_hotels.php" method="post">
            <input type="submit" value="Volver", style="background:lightblue">
      </ul>
      </form>
    </div>
</body>
