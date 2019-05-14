<?php include('../templates/header.html');   ?>

<?php 
    require("../config/conexionv2_grupo48.php");
    session_start();
    $user_id = intval($_SESSION['current_user_id']);
    $today = date("Y-m-d");
    $duration_res = $_POST["duration_input"];
    $state = $_POST["state"];
    $final_date = date('Y-m-d', strtotime(' + '.strval($duration_res).' days'));
    $sid = intval($_POST["sid"]);
    $max_query = "SELECT MAX(regid) FROM Registros";  # Buscamos el máximo id
    $response = $db -> prepare($max_query);
    $response -> execute();
    $max_value = $response -> fetchAll();
    $new_id = intval($max_value[0][0]) + 1;
    $insert_query = "INSERT INTO Registros
                     VALUES ($new_id, $user_id, $sid, '$today', '$final_date', '$state')";
    $insert_ = $db -> prepare($insert_query);
    $insert_ -> execute();
?>
<h2>Se Ha Efectuado El Registro Con Éxito!</h2>
<body>
<br><br>
    <div class="12u$">
      <ul class="actions">
          <form action="show_parks.php" method="post">
            <input type="submit" value="Volver A Parques">
      </ul>
      </form>
      <ul class="actions">
          <form action="../views/main.php" method="post">
            <input type="submit" value="Volver A La Página Principal">
      </ul>
      </form>
    </div>
</body>
