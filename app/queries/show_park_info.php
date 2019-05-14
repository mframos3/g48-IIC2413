<?php include('../templates/header.html');   
session_start();
$pid = intval($_GET["pid"]);
?>

<body>
    <section id="banner">
        <h2><strong>Información del Parque</strong>
        <br/></h2>
        <p>Senderos y Atractivos</p>
        <nav class="navbar navbar-light bg-light">
            <form class="form-inline" action="show_park_info.php?pid=<?php echo strval($pid);?>" method="post">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" 
                style="color:black" name="limitacion">
                <input name="submit" type="submit">
            </form>
        </nav>
    </section>
    <table>
    <tr>   
    <?php require_once ("../config/conexion_grupo48.php"); $conexion=conectarBD();?>
    <?php
    if (isset($_POST['submit'])) {
        $limitacion = $_POST["limitacion"];
        $query = "SELECT snombre, dificultad, duracion, sid FROM Senderos WHERE pid = $pid AND snombre LIKE '%$limitacion%'";
    } else {$query = "SELECT snombre, dificultad, duracion, sid FROM Senderos WHERE pid = $pid";}
    $resultado=pg_query($conexion, $query) or die ("Error en la consulta");
    $nr=pg_num_rows($resultado);
    if ($nr>0) {
        if (isset($_SESSION["current_user_id"])) {
            echo "<td><table><tr><td><div class='table-wrapper'>
            <table>
                <thead>
                <tr><th>Nombre Sendero</th>
                <th>Dificultad</th>
                <th>Duración</th>
                <th>Inscribir Sendero</th></tr>
                </thead>";
        } else {
            echo "<td><table><tr><td><div class='table-wrapper'>
            <table>
                <thead>
                <tr><th>Nombre Sendero</th>
                <th>Dificultad</th>
                <th>Duración</th></tr>
                </thead>";
        }
    echo "<tbody>";
            while($filas=pg_fetch_array($resultado)) {
                echo "<td>".$filas["snombre"]."</td>";
                echo "<td>".$filas["dificultad"]."</td>";
                if (isset($_SESSION["current_user_id"])) {
                    echo "<td>".$filas["duracion"]."</td>";
                    echo "<td><a href=../views/register_trail.php?sid=",$filas["sid"],">"."Inscribir"."</a></td>"."</tr>";
                } else {
                    echo "<td>".$filas["duracion"]."</td></tr>";
                }
                } echo "</tbody></table></div></td</tr></table>";
    } else {echo "No hay datos";} 
    $query = "SELECT anombre, url FROM Atractivos WHERE pid = $pid";
    $resultado=pg_query($conexion, $query) or die ("Error en la consulta");
    $nr=pg_num_rows($resultado);
    if ($nr>0) {
        echo "</td><td><table<tr><td><div class='table-wrapper'>
                <table>
                <thead>
                <tr><th>Nombre Atractivo</th>
                <th>URL</th>
                </thead>";
    echo "<tbody>";
            while($filas=pg_fetch_array($resultado)) {
                echo "<td>".$filas["anombre"]."</td>";
                echo "<td>".$filas["url"]."</td></tr>";
                } echo "</tbody></table></div></td></tr></table>";
    } else {echo "No hay datos";}
    ?>
    </tr>
    </table>
    <br><br>
    <div class="12u$">
      <ul class="actions">
          <form action="show_parks.php" method="post">
            <input type="submit" value="Volver", style="background:lightblue">
      </ul>
      </form>
    </div>
</body>
