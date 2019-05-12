<?php include('../templates/header.html');   ?>

<body>
    <section id="banner">
        <h2><strong>Agencias</strong>
        <br/></h2>
        <p>Haz click a la agencia para ver los tours que ofrece.</p>
    </section>

<?php require_once ("../config/conexion_grupo49.php"); $conexion=conectarBD();?>
<?php
$query = "SELECT nombre, direccion, telefono, aid FROM Agencias";
$resultado=pg_query($conexion, $query) or die ("Error en la consulta");
$nr=pg_num_rows($resultado);
if ($nr>0) {
    echo "<div class='table-wrapper'>
          <table>
            <thead>
            <tr><th>Nombre Agencia</th>
            <th>Dirección</th>
            <th>Teléfono</th></tr>
            </thead>";
  echo "<tbody>";
        while($filas=pg_fetch_array($resultado)) {
            echo "<tr><td><a href=show_tours.php?aid=",$filas["aid"],">".$filas["nombre"]."</a></td>";
            echo "<td>".$filas["direccion"]."</td>";
            echo "<td>".$filas["telefono"]."</td></tr>";
            } echo "</tbody></table></div>";
} else {echo "No hay datos";}
?>

<?php include('../templates/footer.html'); ?>