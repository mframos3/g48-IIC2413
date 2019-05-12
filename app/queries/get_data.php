<?php

    require("../config/conexion_grupo48.php");
    $mail = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT *
             FROM usuarios WHERE correo = '$mail'
             AND password = '$password'";
    $result = $db -> prepare($query);
	$result -> execute();
    $cantidad = $result -> fetchAll();

    if (sizeof($cantidad) == 1){
        session_start();
        $_SESSION["current_user_id"] = $cantidad[0][0];
        header ("Location: ../main.php");
    }
    else{
        ?>
    <h2>Los datos ingresados son incorrectos</h2>
        <a href="../login.php">Volver a intentar</a>

  
<?php
    }
?>

