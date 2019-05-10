<?php

    require("../config/conexion.php");
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT *
             FROM usuarios WHERE unombre = '$username'
             AND password = '$password'";
    $result = $db -> prepare($query);
	$result -> execute();
    $cantidad = $result -> fetchAll();

    if (sizeof($cantidad) == 1){
        header ("Location:../main.php");
    }
    else{
        ?>
    <h2>Los datos ingresados son incorrectos</h2>
        <a href="../login.php">Volver a intentar</a>

  
<?php
    }
?>

