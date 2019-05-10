<?php

    require("../config/conexion.php");
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $query = "SELECT COUNT(*) 
             FROM Usuarios WHERE Usuarios.unombre = $username AND
              Usuarios.password = $password";
    $result = $db -> prepare($query);
	$result -> execute();
	$cantidad = $result -> fetchAll();
    if ($cantidad == 1){
        $msg = 'Bien';
        echo "Bien!!!";
        he
    }
    else{
        header ("login.php")
    }
?>

