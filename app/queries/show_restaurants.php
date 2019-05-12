<?php include('../templates/header.html');   ?>

<body>
    <section id="banner">
        <h2><strong>Restaurantes</strong>
        <br/></h2>
        <p>Haz click al restaurante para ver sus platos.</p>
    </section>

<?php require_once ("../config/conexion_grupo49.php"); $conexion=conectarBD();?>
<?php
$query = "SELECT nombre_restaurant, direccion, rid, telefono, restid FROM Restaurantes";
$resultado=pg_query($conexion, $query) or die ("Error en la consulta");
$nr=pg_num_rows($resultado);
if ($nr>0) {
    echo "<div class='table-wrapper'>
          <table>
            <thead>
            <tr><th>Nombre Restaurant</th>
            <th>Dirección</th>
            <th>Región</th>
            <th>Teléfono</th></tr>
            </thead>";
  echo "<tbody>";
        while($filas=pg_fetch_array($resultado)) {
            echo "<tr><td><a href=show_menu.php?restid=",$filas["restid"],">".$filas["nombre_restaurant"]."</a></td>";
            echo "<td>".$filas["direccion"]."</td>";
            echo "<td>".strval(intval($filas["rid"]) + 1)."</td>";
            echo "<td>".$filas["telefono"]."</td></tr>";
            } echo "</tbody></table></div>";
} else {echo "No hay datos";}
?>

<?php include('../templates/footer.html'); ?>