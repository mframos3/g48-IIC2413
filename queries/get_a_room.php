<?php include('../templates/header.html');   ?>

<?php 
    require("../config/conexionv2_grupo49.php");
    session_start();
    $user_id = intval($_SESSION['current_user_id']);
    $today = date("Y-m-d");
    $duration_res = $_POST["duration_input"];
    $final_date = date('Y-m-d', strtotime(' + '.strval($duration_res).' days'));
    $habid_required = intval($_POST["habid_input"]);
    $max_query = "SELECT MAX(resvid) FROM Reservas";  # Buscamos el máximo id
    $response = $db -> prepare($max_query);
    $response -> execute();
    $max_value = $response -> fetchAll();
    $new_id = intval($max_value[0][0]) + 1;
    $insert_query = "INSERT INTO Reservas
                     VALUES ($new_id, $user_id, $habid_required, '$today', '$final_date')";
    $insert_ = $db -> prepare($insert_query);
    $insert_ -> execute();
?>
<h2>Se Ha Efectuado La Reserva Con Éxito!</h2>
<body>
<br><br>
    <div class="12u$">
      <ul class="actions">
          <form action="show_hotels.php" method="post">
            <input type="submit" value="Volver A Hoteles", style="background:lightblue">
      </ul>
      </form>
      <ul class="actions">
          <form action="../views/main.php" method="post">
            <input type="submit" value="Volver A La Página Principal", style="background:lightblue">
      </ul>
      </form>
    </div>
</body>
