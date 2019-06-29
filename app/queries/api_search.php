<?php include('../templates/header.html');   ?>

<body>
    <section id="banner">
        <h2><strong>Resultados De La Búsqueda</strong>
        <br/></h2>
    </section>
<?php
    require("../config/conexionv2_grupo48.php");
    $required_input = $_POST["required_input"];
    $desirable_input = $_POST["desirable_input"];
    $prohibited_input = $_POST["prohibited_input"];
    if ($required_input == "") {
        $required = array();
    }
    else {
        $required = explode('%', $required_input);
    }
    if ($desirable_input == "") {
        $desirable = array();
    }
    else {
        $desirable = explode('%', $_POST["desirable_input"]);
    }
    if ($prohibited_input == "") {
        $prohibited = array();
    }
    else {
        $prohibited = explode('%', $_POST["prohibited_input"]);
    }
    $mode = strval($_POST["user_input"]);

    if ($mode == "") {
        $data = array("required" => $required, "desirable" => $desirable, "prohibited" => $prohibited);                                                                    
        $data_json = json_encode($data);                                                                                                                                                                                   
        $ch = curl_init("https://api-g25.herokuapp.com/messages");                                                    
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($data_json))                                                                       
        );                                                                                                                                                                                                                        
        $api_result = json_decode(curl_exec($ch), true);

    } 
    else {
        $user_query = "SELECT uid FROM Usuarios WHERE correo = '$mode'";
        $response = $db -> prepare($user_query);
        $response -> execute();
        $result = $response -> fetchAll();
        
        if (sizeof($result) > 0){
            $uid = $result[0][0];
            $data = array("required" => $required, "desirable" => $desirable, "prohibited" => $prohibited);                                                                    
            $data_json = json_encode($data);                                                                                                                                                                                   
            $ch = curl_init("https://api-g25.herokuapp.com/users/$uid");                                                    
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                 
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);                                                                  
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
                'Content-Type: application/json',                                                                                
                'Content-Length: ' . strlen($data_json))                                                                       
            );                                                                                                                                                                                                                        
            $api_result = json_decode(curl_exec($ch), true)[0]['sent_messages'];
        }
        else {
            $api_result = array();
            echo "<h2>No Existe Ningún Usuario Con El Email Ingresado!</h2>";
        }
    }
    if (sizeof($api_result) > 0) {
        echo "<div class='table-wrapper'>
              <table>
                <thead>
                <tr><th>De</th>
                <th>Para</th>
                <th>Mensaje</th>
                <th>Fecha de Envío</th>
                <th>Latitud</th>
                <th>Longitud</th></tr>
                </thead>";
        echo "<tbody>";
            foreach ($api_result as $r) {
                echo "<tr><td>".$r["sender"]."</td>";
                echo "<td>".$r["receptant"]."</td>";
                echo "<td>".$r["message"]."</td>";
                echo "<td>".$r["date"]."</td>";
                echo "<td>".$r["lat"]."</td>";
                echo "<td>".$r["long"]."</td></tr>";
                } echo "</tbody></table></div>";
    } else {echo "No hay datos!";}
?>
<br><br>
    <div class="12u$">
      <ul class="actions">
          <form action="search_messages.php" method="post">
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
