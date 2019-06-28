<?php include('../templates/header.html');   ?>

<body>
    <section id="banner">
        <h2><strong>Enviados</strong>
        <br/></h2>
    </section>
<?php
session_start(); 
$uid = intval($_SESSION["current_user_id"]);

#$result = ;
#$nr = pg_num_rows($result);
#if ($nr>0) {
    #echo "<div class='table-wrapper'>
          #<table>
            #<thead>
            #<tr><th>Fecha Inicial</th>
            #<th>Fecha Final</th>
            #<th>Hotel</th>
            #<th>Habitación</th>
            #<th>Precio</th></tr>
            #</thead>";
  #echo "<tbody>";
        #while($filas = pg_fetch_array($result)) {
            #echo "<tr><td>".$filas["fecha_inicio"]."</td>";
            #echo "<td>".$filas["fecha_fin"]."</td>";
            #echo "<td>".$filas["nombre_hotel"]."</td>";
            #echo "<td>".$filas["nombre_habitacion"]."</td>";
            #echo "<td>".$filas["precio"]."</td></tr>";
            #} echo "</tbody></table></div>";
#} else {echo "No hay datos!";}
?>
<br><br>
  <div class="12u$">
      <ul class="actions">
          <form action="../views/messages.php" method="post">
            <input type="submit" value="Volver", style="background:lightblue">
      </ul>
  </div>
  </form>
</body>
