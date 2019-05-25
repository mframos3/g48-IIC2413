<?php include('../templates/header.html');   ?>

<body>
    <section id="banner">
        <h2><strong>Vinos</strong>
        <br/></h2>
    </section>
<?php require_once ("../config/conexion_grupo48.php"); $conexion=conectarBD();?>
<?php
$vid = $_GET["vid"];
$query = "SELECT vino_nombre, cepa, vprecio FROM Vinos WHERE vid = $vid";
$resultado=pg_query($conexion, $query) or die ("Error en la consulta");
$nr=pg_num_rows($resultado);
if ($nr>0) {
    echo "<div class='table-wrapper'>
          <table>
            <thead>
            <tr><th>Nombre Vino</th>
            <th>Cepa</th>
            <th>Precio</th>
            </thead>";
  echo "<tbody>";
        while($filas=pg_fetch_array($resultado)) {
            echo "<td>".$filas["vino_nombre"]."</td>";
            echo "<td>".$filas["cepa"]."</td>";
            echo "<td>".$filas["vprecio"]."</td></tr>";
            } echo "</tbody></table></div>";
} else {echo "No hay datos";}
?>
<br><br>
    <div class="12u$">
      <ul class="actions">
          <form action="show_vineyards.php" method="post">
            <input type="submit" value="Volver", style="background:lightblue">
      </ul>
      </form>
    </div>
</body>
