<?php include('template/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $cepa = $_POST["cepa"];
  $tnombre = $_POST["tnombre"];
  $query = "SELECT DISTINCT V.vino_nombre
            FROM Enoturismo E, VinosDegustados D, Vinos V
            WHERE E.tnombre LIKE '%$tnombre%' AND E.tid = D.tid 
            AND D.vino_id = V.vino_id AND V.cepa LIKE '%$cepa%'";
  $result = $db -> prepare($query);
  $result -> execute();
  $wine_name = $result -> fetchAll();
?>

  <h3>Vinos de la Cepa <?php echo $cepa ?> 
  Presentes en el <?php echo $tnombre ?> </h3> 
  <table>
    <tr>
      <th>Nombre</th>
    </tr>
  <?php
	foreach ($wine_name as $p) {
  		echo "<tr><td>$p[0]</td></tr>";
	}
  ?>
	</table>
<?php include('../templates/footer.html'); ?>
