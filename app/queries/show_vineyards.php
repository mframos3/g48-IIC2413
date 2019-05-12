<?php include('../templates/header.html');   ?>

<body>
    <section id="banner">
        <h2><strong>Viñas</strong>
        <br/></h2>
        <p>Haz click en la viña para ver sus variedades de vinos.</p>
    </section>

<?php require_once ("../config/conexion_grupo48.php"); $conexion=conectarBD();?>
<?php
$query = "SELECT vnombre, rid, vtelefono, vid FROM Vinas ORDER BY rid";
$resultado=pg_query($conexion, $query) or die ("Error en la consulta");
$nr=pg_num_rows($resultado);
if ($nr>0) {
    echo "<div class='table-wrapper'>
          <table>
            <thead>
            <tr><th>Nombre Viña</th>
            <th>Región</th>
            <th>Teléfono</th></tr>
            </thead></tr>";
  echo "<tbody>";
        while($filas=pg_fetch_array($resultado)) {
            echo "<tr><td><a href=show_wines.php?vid=",$filas["vid"],">".$filas["vnombre"]."</a></td>";
            echo "<td>".strval(intval($filas["rid"]) + 1)."</td>";
            echo "<td>".$filas["vtelefono"]."</td></tr>";
            } echo "</tbody></table></div>";
} else {echo "No hay datos";}
?>

<?php include('../templates/footer.html'); ?>