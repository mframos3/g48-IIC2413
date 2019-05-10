<?php include('template/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $n = intval($_POST["i_esimo_sendero"]);
  
  $query = "SELECT snombre 
            FROM Senderos 
            WHERE largo IN (SELECT DISTINCT S.largo FROM Senderos S 
            ORDER BY S.largo DESC LIMIT 1 OFFSET $n - 1)";

	$result = $db -> prepare($query);
	$result -> execute();
  $senderos = $result -> fetchAll();
?>
  
  <h3>I-ésimos Senderos Más Largos</h3>
  <table>
    <tr>
      <th>Nombre</th>
    </tr>
  <?php
	  foreach ($senderos as $p) {
      echo "<tr><td>$p[0]</td></tr>";
      }
  ?>
  </table>
  
<?php include('../templates/footer.html'); ?>
