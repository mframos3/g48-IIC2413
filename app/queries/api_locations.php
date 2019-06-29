<?php include('../templates/header.html');   ?>
<body>
    <section id="banner">
        <h2><strong>Lugares Según Mensajes Enviados</strong>
        <br/></h2>
    </section>
<?php
    session_start();
    $user_id = intval($_SESSION['current_user_id']);
    $initial_date = $_POST["initial_input"];
    $final_date = $_POST["final_input"];

    $data = array("required" => array(), "desirable" => array(), "prohibited" => array());                                                                    
    $data_json = json_encode($data);                                                                                                                                                                            
    $ch = curl_init("https://api-g25.herokuapp.com/users/$user_id");                                                    
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',                                                                                
        'Content-Length: ' . strlen($data_json))                                                                       
    );                                                                                                                                                                                                                        
    $api_result = json_decode(curl_exec($ch), true)[0]['sent_messages'];
    $sortArray = array();

    foreach($api_result as $r){
        foreach($r as $key=>$value){
            if(!isset($sortArray[$key])){
                $sortArray[$key] = array();
            }
            $sortArray[$key][] = $value;
        }
    }

    $orderby = "date";
    if (sizeof($api_result) > 0) {
        array_multisort($sortArray[$orderby], SORT_DESC, $api_result);
    }
    
    if (sizeof($api_result) > 0) {
        echo "<div class='table-wrapper'>
              <table>
                <thead>
                <tr><th>Fecha de Envío</th>
                <th>Lugar de Envío</th></tr>
                </thead>";
        echo "<tbody>";
            foreach ($api_result as $r) {
                if (($initial_date <= $r["date"]) and ($r["date"] <= $final_date)) {
                    echo "<tr><td>".$r["date"]."</td>";
                    $lat = strval($r["lat"]);
                    $long = strval($r["long"]);
                    echo "<td>"."<div style='width: 90%'><iframe width='90%' height='480' 
                    src='https://maps.google.com/maps?width=90%&height=480&hl=es&q=$lat,$long
                    &ie=UTF8&t=&z=14&iwloc=B&output=embed' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe>
                    </div>"."</td></tr>";
                }
                } echo "</tbody></table></div>";
    } else {echo "No hay datos!";}
?>
<br><br>
    <div class="12u$">
      <ul class="actions">
          <form action="locations.php" method="post">
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
