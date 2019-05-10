<?php include('template/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $query = "SELECT sid, snombre, largo, duracion, dificultad 
            FROM Senderos
            WHERE sid IN (SELECT R.sid FROM Registros R WHERE R.estado = 'perdido'
            GROUP BY R.sid HAVING Count(*) IN (SELECT Count(*) FROM Registros R 
            WHERE R.estado = 'perdido' GROUP BY R.sid 
            ORDER BY Count(*) DESC LIMIT 1))";
  
  $result = $db -> prepare($query);
  $result -> execute();
  
  $senderos = $result -> fetchAll();
?>
  
  <h3>Senderos Con La Mayor Cantidad De Personas Perdidas</h3>
  <table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Largo</th>
      <th>Duración</th>
      <th>Dificultad</th>
    </tr>
  
<?php 
  foreach ($senderos as $p) {
    echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td>
    <td>$p[3]</td><td>$p[4]</td></tr>";
  }
?>
  </table>

<?php include('../templates/footer.html'); ?>
