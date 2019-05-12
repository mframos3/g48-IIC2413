<?php

    require("../config/conexionv2_grupo49.php");
    session_start();
    $uid = intval($_SESSION['current_user_id']);
    $restid = intval($_POST['restid_input']);
    $query = "SELECT *
             FROM  RestaurantesFavoritos AS RF 
             WHERE RF.uid = $uid AND RF.restid = $restid ";
    $result = $db -> prepare($query);
	$result -> execute();
    $response = $result -> fetchAll();
    if (sizeof($response) > 0){
        echo "<h3>El restaurant seleccionado ya está entre tus favoritos</h3>";
    }
    else{
        $insert_query = "INSERT INTO RestaurantesFavoritos(restid,uid)  
             VALUES ($restid, $uid)";
        $result = $db -> prepare($insert_query);
        $result -> execute();
        echo "Se ha agregado correctamente";

    }
?>
<a href="../views/favourites_restaurants.php">Volver</a>
