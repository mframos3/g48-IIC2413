<?php include('../templates/header.html');   ?>

<body>
    <section id="banner">
        <h2><strong>Habitaciones</strong>
        <br/></h2>
    </section>

<?php require_once ("../config/conexion_grupo49.php"); $conexion=conectarBD();?>
<?php
$hid = $_GET["hid"];
$query = "SELECT nombre_habitacion, precio FROM Habitaciones WHERE hid = $hid";
$resultado=pg_query($conexion, $query) or die ("Error en la consulta");
$nr=pg_num_rows($resultado);
if ($nr>0) {
    echo "<div class='table-wrapper'>
          <table>
            <thead>
            <tr><th>Nombre Habitación</th>
            <th>Precio</th>
            </thead>";
  echo "<tbody>";
        while($filas=pg_fetch_array($resultado)) {
            echo "<td>".$filas["nombre_habitacion"]."</td>";
            echo "<td>".$filas["precio"]."</td></tr>";
            } echo "</tbody></table></div>";
} else {echo "No hay datos";}
?>

<?php include('../templates/footer.html'); ?>