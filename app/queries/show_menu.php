<?php include('../templates/header.html');   ?>

<body>
    <section id="banner">
        <h2><strong>Restaurantes</strong>
        <br/></h2>
        <p>Haz click al restaurante para ver sus platos.</p>
    </section>

<?php require_once ("../config/conexion_grupo49.php"); $conexion=conectarBD();?>
<?php
$restid = $_GET["restid"];
$query = "SELECT nombre_plato, precio FROM Platos WHERE restid = $restid";
$resultado=pg_query($conexion, $query) or die ("Error en la consulta");
$nr=pg_num_rows($resultado);
if ($nr>0) {
    echo "<div class='table-wrapper'>
          <table>
            <thead>
            <tr><th>Nombre Plato</th>
            <th>Precio</th>
            </thead>";
  echo "<tbody>";
        while($filas=pg_fetch_array($resultado)) {
            echo "<td>".$filas["nombre_plato"]."</td>";
            echo "<td>".$filas["precio"]."</td></tr>";
            } echo "</tbody></table></div>";
} else {echo "No hay datos";}
?>

<?php include('../templates/footer.html'); ?>