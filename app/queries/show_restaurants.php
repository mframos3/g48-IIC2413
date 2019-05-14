<?php include('../templates/header.html');   
session_start();
?>

<body>
    <section id="banner">
        <h2><strong>Restaurantes</strong>
        <br/></h2>
        <p>Haz click al restaurante para ver sus platos.</p>
        <nav class="navbar navbar-light bg-light">
            <form class="form-inline" action="show_restaurants.php" method="post">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" 
                style="color:black" name="limitacion">
                <input name="submit" type="submit">
            </form>
        </nav>
    </section>

<?php require_once ("../config/conexion_grupo49.php"); $conexion=conectarBD();?>
<?php
if (isset($_POST['submit'])) {
    $limitacion = $_POST["limitacion"];
    $query = "SELECT nombre_restaurant, direccion, rid, telefono, restid FROM Restaurantes WHERE nombre_restaurant LIKE '%$limitacion%'";
} else {$query = "SELECT nombre_restaurant, direccion, rid, telefono, restid FROM Restaurantes";}
$resultado=pg_query($conexion, $query) or die ("Error en la consulta");
$nr=pg_num_rows($resultado);
if ($nr>0) {
    if (isset($_SESSION["current_user_id"])) {
        echo "<div class='table-wrapper'>
          <table>
            <thead>
            <tr><th>Nombre Restaurant</th>
            <th>Dirección</th>
            <th>Región</th>
            <th>Teléfono</th>
            <th>Guardar Como Favorito</th></tr>
            </thead>";
    } else {
        echo "<div class='table-wrapper'>
          <table>
            <thead>
            <tr><th>Nombre Restaurant</th>
            <th>Dirección</th>
            <th>Región</th>
            <th>Teléfono</th></tr>
            </thead>";
    }
  echo "<tbody>";
        while($filas=pg_fetch_array($resultado)) {
            echo "<tr><td><a href=show_menu.php?restid=",$filas["restid"],">".$filas["nombre_restaurant"]."</a></td>";
            echo "<td>".$filas["direccion"]."</td>";
            echo "<td>".strval(intval($filas["rid"]) + 1)."</td>";
            echo "<td>".$filas["telefono"]."</td>";
            if (isset($_SESSION["current_user_id"])) {
                echo "<td><a href=add_restaurant.php?restid_input=",$filas["restid"],">"."Guardar"."</a></td>"."</tr>";
            }
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
