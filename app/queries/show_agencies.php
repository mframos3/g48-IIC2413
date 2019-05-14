<?php include('../templates/header.html');   
session_start();
?>

<body>
    <section id="banner">
        <h2><strong>Agencias</strong>
        <br/></h2>
        <p>Haz click a la agencia para ver los tours que ofrece.</p>
        <nav class="navbar navbar-light bg-light">
            <form class="form-inline" action="show_agencies.php" method="post">
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
    $query = "SELECT nombre, direccion, telefono, aid FROM Agencias WHERE nombre LIKE '%$limitacion%'";
} else {$query = "SELECT nombre, direccion, telefono, aid FROM Agencias";}
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
