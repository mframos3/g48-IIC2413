<?php include('../templates/header.html');   ?>

<body>
    <section id="banner">
        <h2><strong>Enviar Mensaje</strong>
        <br/></h2>
    </section>
<?php
require_once ("../config/conexion_grupo48.php"); $conexion=conectarBD();
session_start();
$uid = intval($_SESSION["current_user_id"]);
# Form para mandar un mensaje (se pone email receptor y se consulta por su id, 
# si no existe no se hace nada y se indica, en caso contrario se manda el mensaje) 

#$query = "SELECT * FROM Enoturismo ORDER BY tnombre";
#$resultado= pg_query($conexion, $query) or die ("Error en la consulta");
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
