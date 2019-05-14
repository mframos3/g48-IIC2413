<?php include('../templates/header.html');   
session_start();
?>

<body>
    <section id="banner">
        <h2><strong>Hoteles</strong>
        <br/></h2>
        <p>Haz click al hotel para ver sus habitaciones.</p>
    </section>

<?php require_once ("../config/conexion_grupo49.php"); $conexion = conectarBD();?>
<?php
$query = "SELECT nombre_hotel, direccion, rid, telefono, hid FROM Hoteles";
$resultado=pg_query($conexion, $query) or die ("Error en la consulta");
$nr=pg_num_rows($resultado);
if ($nr>0) {
    echo "<div class='table-wrapper'>
          <table>
            <thead>
            <tr><th>Nombre Hotel</th>
            <th>Dirección</th>
            <th>Región</th>
            <th>Teléfono</th></tr>
            </thead>";
  echo "<tbody>";
        while($filas=pg_fetch_array($resultado)) {
            echo "<tr><td><a href=show_rooms.php?hid=",$filas["hid"],">".$filas["nombre_hotel"]."</a></td>";
            echo "<td>".$filas["direccion"]."</td>";
            echo "<td>".strval(intval($filas["rid"]) + 1)."</td>";
            echo "<td>".$filas["telefono"]."</td></tr>";
            } echo "</tbody></table></div>";
} else {echo "No hay datos";}
if (isset($_SESSION["current_user_id"])) {
    $s = "../views/main.php";
} else {
    $s = "../index.html";
}
?>
<br><br>
    <div class="12u$">
      <ul class="actions">
          <form action=<?php echo $s?> method="post">
            <input type="submit" value="Volver">
      </ul>
      </form>
    </div>
</body>
