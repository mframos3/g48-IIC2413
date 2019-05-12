<?php include('../templates/header.html');   ?>

<body>
    <section id="banner">
        <h2><strong>Información del parque</strong>
        <br/></h2>
        <p>Senderos y atractivos</p>
    </section>
    <table>
    <tr>   
    <?php require_once ("../config/conexion_grupo48.php"); $conexion=conectarBD();?>
    <?php
    $pid = $_GET["pid"];
    $query = "SELECT snombre, dificultad, duracion FROM Senderos WHERE pid = $pid";
    $resultado=pg_query($conexion, $query) or die ("Error en la consulta");
    $nr=pg_num_rows($resultado);
    if ($nr>0) {
        echo "<td><table><tr><td><div class='table-wrapper'>
            <table>
                <thead>
                <tr><th>Nombre Sendero</th>
                <th>Dificultad</th>
                <th>Duración</th>
                </thead>";
    echo "<tbody>";
            while($filas=pg_fetch_array($resultado)) {
                echo "<td>".$filas["snombre"]."</td>";
                echo "<td>".$filas["dificultad"]."</td>";
                echo "<td>".$filas["duracion"]."</td></tr>";
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

<?php include('../templates/footer.html'); ?>