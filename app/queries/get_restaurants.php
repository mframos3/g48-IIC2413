<?php include('../templates/header.html');   ?>

<body>
    <section id="banner">
        <h2><strong>Restaurantes Favoritos</strong>
        <br/></h2>
    </section>
<?php require_once ("../config/conexion_grupo49.php"); $conexion=conectarBD();?>
<?php
session_start(); 
$uid = intval($_SESSION["current_user_id"]);
$query = "SELECT R.nombre_restaurant, R.direccion, R.descripcion_restaurant
          FROM Restaurantes R, RestaurantesFavoritos RF 
          WHERE R.restid = RF.restid AND RF.uid = $uid";
$result = pg_query($conexion, $query) or die ("Error en la consulta!");
$nr = pg_num_rows($result);
if ($nr>0) {
    echo "<div class='table-wrapper'>
          <table>
            <thead>
            <tr><th>Nombre</th>
            <th>Dirección</th>
            <th>Descripción</th></tr>
            </thead>";
  echo "<tbody>";
        while($filas = pg_fetch_array($result)) {
            echo "<tr><td>".$filas["nombre_restaurant"]."</td>";
            echo "<td>".$filas["direccion"]."</td>";
            echo "<td>".$filas["descripcion_restaurant"]."</td></tr>";
            } echo "</tbody></table></div>";
} else {echo "No hay datos!";}
?>
<br><br>
  <div class="12u$">
      <ul class="actions">
          <form action="../views/profile.php" method="post">
            <input type="submit" value="Volver", style="background:lightblue">
      </ul>
  </div>
  </form>
</body>
