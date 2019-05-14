<?php include('../templates/header.html');   ?>

<body>
    <section id="banner">
        <h2><strong>Tours</strong>
        <br/></h2>
    </section>

<?php require_once ("../config/conexion_grupo49.php"); $conexion=conectarBD();?>
<?php
$aid = $_GET["aid"];
$query = "SELECT descripcion, precio FROM Tours WHERE aid = $aid";
$resultado=pg_query($conexion, $query) or die ("Error en la consulta");
$nr=pg_num_rows($resultado);
if ($nr>0) {
    echo "<div class='table-wrapper'>
          <table>
            <thead>
            <tr><th>Descripción</th>
            <th>Precio</th>
            </thead>";
  echo "<tbody>";
        while($filas=pg_fetch_array($resultado)) {
            echo "<td>".$filas["descripcion"]."</td>";
            echo "<td>".$filas["precio"]."</td></tr>";
            } echo "</tbody></table></div>";
} else {echo "No hay datos";}
?>
<br><br>
    <div class="12u$">
      <ul class="actions">
          <form action="show_agencies.php" method="post">
            <input type="submit" value="Volver">
      </ul>
      </form>
    </div>
</body>
