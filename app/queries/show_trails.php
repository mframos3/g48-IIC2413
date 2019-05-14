<?php include('../templates/header.html');   ?>

<body>
    <section id="banner">
        <h2><strong>Senderos</strong>
        <br/></h2>
    </section>

<?php require_once ("../config/conexion_grupo48.php"); $conexion=conectarBD();?>
<?php
session_start(); 
$uid = intval($_SESSION["current_user_id"]);
$query = "SELECT R.fentrada, R.fsalida, P.pnombre, S.snombre, R.estado
          FROM Senderos S, Registros R, Parques P
          WHERE R.uid = $uid AND R.sid = S.sid AND S.pid = P.pid";
$result = pg_query($conexion, $query) or die ("Error en la consulta!");
$nr = pg_num_rows($result);
if ($nr>0) {
    echo "<div class='table-wrapper'>
          <table>
            <thead>
            <tr><th>Fecha Inicial</th>
            <th>Fecha Final</th>
            <th>Parque</th>
            <th>Sendero</th>
            <th>Estado</th></tr>
            </thead>";
  echo "<tbody>";
        while($filas = pg_fetch_array($result)) {
            echo "<tr><td>".$filas["fentrada"]."</td>";
            echo "<td>".$filas["fsalida"]."</td>";
            echo "<td>".$filas["pnombre"]."</td>";
            echo "<td>".$filas["snombre"]."</td>";
            echo "<td>".$filas["estado"]."</td></tr>";
            } echo "</tbody></table></div>";
} else {echo "No hay datos!";}
?>

<br><br>
  <div class="12u$">
      <ul class="actions">
          <form action="../views/profile.php" method="post">
            <input type="submit" value="Volver">
      </ul>
  </div>
  </form>
</body>
