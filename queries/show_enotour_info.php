<?php include('../templates/header.html');   ?>

<body>
    <section id="banner">
        <h2><strong>Información del Tour</strong>
        <br/></h2>
        <p>Viñas y Vinos</p>
    </section>
    <table>
    <tr>   
    <?php require_once ("../config/conexion_grupo48.php"); $conexion=conectarBD();?>
    <?php
    $tid = $_GET["tid"];
    $query = "SELECT V.vnombre, V.rid, V.vtelefono FROM VinasVisitadas AS VV, Vinas AS V 
    WHERE VV.vid = V.vid AND VV.tid = $tid";
    $resultado=pg_query($conexion, $query) or die ("Error en la consulta");
    $nr=pg_num_rows($resultado);
    if ($nr>0) {
        echo "<td><table><tr><td><div class='table-wrapper'>
            <table>
                <thead>
                <tr><th>Nombre Viña</th>
                <th>Región</th>
                <th>Teléfono</th>
                </thead>";
    echo "<tbody>";
            while($filas=pg_fetch_array($resultado)) {
                echo "<td>".$filas["vnombre"]."</td>";
                echo "<td>".$filas["rid"]."</td>";
                echo "<td>".$filas["vtelefono"]."</td></tr>";
                } echo "</tbody></table></div></td</tr></table>";
    } else {echo "No hay datos";} 
    $query = "SELECT DISTINCT V.vino_nombre, V.cepa FROM VinosDegustados AS VD, Vinos AS V 
    WHERE VD.vino_id = V.vino_id AND VD.tid = $tid";
    $resultado=pg_query($conexion, $query) or die ("Error en la consulta");
    $nr=pg_num_rows($resultado);
    if ($nr>0) {
        echo "</td><td><table<tr><td><div class='table-wrapper'>
                <table>
                <thead>
                <tr><th>Nombre Vino</th>
                <th>Cepa</th>
                </thead>";
    echo "<tbody>";
            while($filas=pg_fetch_array($resultado)) {
                echo "<td>".$filas["vino_nombre"]."</td>";
                echo "<td>".$filas["cepa"]."</td></tr>";
                } echo "</tbody></table></div></td></tr></table>";
    } else {echo "No hay datos";}
    ?>
    </tr>
    </table>
    <br><br>
    <div class="12u$">
      <ul class="actions">
          <form action="show_enotours.php" method="post">
            <input type="submit" value="Volver", style="background:lightblue">
      </ul>
      </form>
    </div>
</body>
