<?php include('../templates/header.html');   ?>

<?php
    require("../config/conexionv2_grupo48.php");
    session_start();
    $user_id = intval($_SESSION['current_user_id']);
    $today = date("Y-m-d");
    $mail = strval($_POST["mail_input"]);
    $message = strval($_POST["message_input"]);
    $lat = 33.34; # Cambiar
    $long = 33.34; # Cambiar
    $user_query = "SELECT uid FROM Usuarios WHERE correo = '$mail'";
    $response = $db -> prepare($user_query);
    $response -> execute();
    $result = $response -> fetchAll();
    
    if (sizeof($result) > 0){
        $receptant = $result[0][0];
        $data = array("sender" => $user_id, "receptant" => $receptant, "lat" => $lat, 
        "long" => $long, "date" => "$today", "message" => "$message");                                                                    
        $data_json = json_encode($data);                                                                                                                                                                                           
        $ch = curl_init('https://api-g25.herokuapp.com/messages');                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($data_json))                                                                       
        );                                                                                                                                                                                                                        
        $api_result = curl_exec($ch);
        echo "<h2>El Mensaje Ha Sido Enviado Correctamente!</h2>";
    }
    else {
        echo "<h2>No Existe Ningún Usuario Con El Email Ingresado!</h2>";
    }
?>
<body>
<br><br>
    <div class="12u$">
      <ul class="actions">
          <form action="send_message.php" method="post">
            <input type="submit" value="Volver", style="background:lightblue">
      </ul>
      </form>
      <ul class="actions">
          <form action="../views/main.php" method="post">
            <input type="submit" value="Volver A La Página Principal", style="background:lightblue">
      </ul>
      </form>
    </div>
</body>
