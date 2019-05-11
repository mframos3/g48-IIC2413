<?php
    require("../config/conexion_grupo48.php");
    session_start();
    $current_user = intval($_SESSION['current_user_id']);
    $path_update = intval($_POST['path_input']);
    $new_state = $_POST['state'];
    $query = "SELECT * FROM Registros 
    WHERE uid = $current_user AND sid = path_update ORDER BY fsalida DESC LIMIT 1";
    # Supuesto : Si ha hecho más de dos veces el mismo sendero, lo logico es que quiera modificar 
    # estado del más actual
    $result = $db -> prepare($query);
	$result -> execute();
    $senderos = $result -> fetchAll();
    if (sizeof($senderos) > 0){
        $regid = $senderos[0][0];
        $new_data_query = "UPDATE Registros
                          SET estado = $new_state
                          WHERE regid = $regid";
        $response = $db -> prepare($new_data_query);
        $response -> execute();
        echo "<h3>Cambios realizados satisfactoriamente</h3>";

    }

    else{
       echo "<h3>No se han podido realizar los cambios</h3>";
    }
?>

<a href="../views/update_state_path.php">Atras</a>