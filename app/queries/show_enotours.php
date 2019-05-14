<?php include('../templates/header.html');   
session_start();
?>

<body>
    <section id="banner">
        <h2><strong>Enotours</strong>
        <br/></h2>
        <p>Elije un tour para conocer las viñas que visita y los vinos que podrás degustar en la experiencia.</p>
        <nav class="navbar navbar-light bg-light">
            <form class="form-inline" action="show_enotours.php" method="post">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" 
                style="color:black" name="limitacion">
                <input name="submit" type="submit">
            </form>
        </nav>
    </section>

<?php require_once ("../config/conexion_grupo48.php"); $conexion=conectarBD();?>
<?php
if (isset($_POST['submit'])) {
    $limitacion = $_POST["limitacion"];
    $query = "SELECT * FROM Enoturismo WHERE tnombre LIKE '%$limitacion%' ORDER BY tnombre";
} else {$query = "SELECT * FROM Enoturismo ORDER BY tnombre";}
$resultado=pg_query($conexion, $query) or die ("Error en la consulta");
$nr=pg_num_rows($resultado);
if ($nr>0) {
    echo "<div class='table-wrapper'>
          <table>
            <thead>
            <tr><th>Nombre Tour</th>
            <th>Precio</th></tr>
            </thead></tr>";
  echo "<tbody>";
        while($filas=pg_fetch_array($resultado)) {
            echo "<tr><td><a href=show_enotour_info.php?tid=",$filas["tid"],">".$filas["tnombre"]."</a></td>";
            echo "<td>".$filas["tprecio"]."</td></tr>";
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
