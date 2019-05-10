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
        header ("Location:../main.php");
    }
    else{
        ?>
        <h2>Los datos ingresados son incorrectos</h2>
        <a href="../login.php">Volver a intentar</a>
  
<?php
    }
?>

