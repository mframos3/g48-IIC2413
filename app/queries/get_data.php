<?php include('../templates/header.html');   ?>

<?php
    require("../config/conexionv2_grupo48.php");
    $mail = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT *
              FROM Usuarios 
              WHERE correo = '$mail'
              AND password = '$password'";
    $result = $db -> prepare($query);
	$result -> execute();
    $cantidad = $result -> fetchAll();
    if (sizeof($cantidad) == 1){
        session_start();
        $_SESSION["current_user_id"] = $cantidad[0][0];
        $_SESSION["current_user_mail"] = strval($mail);
        $_SESSION["current_user_name"] = $cantidad[0][1];
        header ("Location: ../views/main.php");
    }
    else { ?>
    <h2>Los Datos Ingresados Son Incorrectos!</h2>
    <body>
    <br><br>
    <div class="12u$">
      <ul class="actions">
          <form action="../views/login.php" method="post">
            <input type="submit" value="Volver A Intentar", style="background:lightblue">
      </ul>
    </div>
    </form>
    </body>
    <?php
    }
?>
