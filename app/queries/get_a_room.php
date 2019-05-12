
<?php 
    require("../config/conexionv2_grupo49.php");
    session_start();
    $user_id = $_SESSION['current_user_id'];
    $today = date("d-m-y");
    $habid_required = intval($_POST["habid_input"]);
    $duration_res = $_POST["duration_input"];
    $query = "SELECT * FROM Reservas
              WHERE habid=$habid_required AND fecha_fin >= $today";

    # Verificamos si ya hay una reserva para hoy
    
    $result = $db -> prepare($query);
	$result -> execute();
    $habitaciones = $result -> fetchAll();
    if (sizeof($habitaciones) == 0){ # Si es 0, entonces no hay reservas
        $max_query = "SELECT MAX(resvid) FROM Reservas";  # Buscamos el maximo id
        $response = $db -> prepare($max_query);
        $response -> execute();
        $max_value = $response -> fetchAll();
        $new_id = intval($max_value[0]) + 1;
        $insert_query = "INSERT INTO Reservas(resvid, uid, habid, fecha_inicio, fecha_fin)
                        VALUES ($new_id, $user_id, $habid_required, $today, $today + interval
                        '1' day * $duration_res)";
        $insert_ = $db -> prepare($query);
        $insert_ -> execute();
        ?>
        <h3>Se ha efectuado la reserva con exito </h3>
        <?php
    }
    else {
        ?>
        <h3>La habitacion ya esta pedida</h3>
        <?php
    }

?>
<br>
<a href="../views/reserve_room.php">Atras</a>


