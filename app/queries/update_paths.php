<?php include('../templates/header.html');   ?>

<?php 
    require("../config/conexionv2_grupo48.php");
    session_start();
    $current_user = intval($_SESSION['current_user_id']);
    $regid = intval($_POST['regid']);
    $new_state = $_POST['state'];
    $new_data_query = "UPDATE Registros
                       SET estado = '$new_state'
                       WHERE regid = $regid";
    $response = $db -> prepare($new_data_query);
    $response -> execute();
?>
<h2>Se Ha Actualizado El Registro Con Éxito!</h2>
<body>
<br><br>
    <div class="12u$">
      <ul class="actions">
          <form action="show_trails.php" method="post">
            <input type="submit" value="Volver", style="background:lightblue">
      </ul>
      </form>
    </div>
</body>
