<?php include('../templates/header.html');   ?>

<body>
    <section id="banner">
        <h2><strong>Parques Nacionales</strong>
        <br/></h2>
        <p>Elije un parque para informarte acerca de sus senderos y atractivos.</p>
        <nav class="navbar navbar-light bg-light">
            <form class="form-inline" action="show_parks.php" method="post">
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
    $query = "SELECT pnombre, rid, tarifa, pid FROM Parques WHERE pnombre LIKE '%$limitacion%' ORDER BY rid";
} else {$query = "SELECT pnombre, rid, tarifa, pid FROM Parques ORDER BY rid";}
$resultado=pg_query($conexion, $query) or die ("Error en la consulta");
$nr=pg_num_rows($resultado);
if ($nr>0) {
    echo "<div class='table-wrapper'>
          <table>
            <thead>
            <tr><th>Nombre Parque</th>
            <th>Región</th>
            <th>Tarifa</th></tr>
            </thead></tr>";
  echo "<tbody>";
        while($filas=pg_fetch_array($resultado)) {
            echo "<tr><td><a href=show_park_info.php?pid=",$filas["pid"],">".$filas["pnombre"]."</a></td>";
            echo "<td>".strval(intval($filas["rid"]) + 1)."</td>";
            echo "<td>".$filas["tarifa"]."</td></tr>";
            } echo "</tbody></table></div>";
} else {echo "No hay datos";}
?>

<?php include('../templates/footer.html'); ?>