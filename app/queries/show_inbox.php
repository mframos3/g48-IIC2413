<?php include('../templates/header.html');   ?>

<body>
    <section id="banner">
        <h2><strong>Recibidos</strong>
        <br/></h2>
    </section>
<?php


session_start(); 
$uid = intval($_SESSION["current_user_id"]);
$data = array("required" => array(), "desirable" => array(), "prohibited" => array());                                                                    
$data_json = json_encode($data);                                                                                                                                                                                   
$ch = curl_init("https://api-g25.herokuapp.com/users/$uid");                                                    
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                 
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_json))                                                                       
);                                                                                                                                                                                                                        
$api_result = json_decode(curl_exec($ch), true)[0]['received_messages'];
# Con esto se ordena por fecha
$sortArray = array();

foreach($api_result as $r){
    foreach($r as $key=>$value){
        if(!isset($sortArray[$key])){
            $sortArray[$key] = array();
        }
        $sortArray[$key][] = $value;
    }
}

$orderby = "date"; //change this to whatever key you want from the array

array_multisort($sortArray[$orderby],SORT_DESC,$api_result);

if (sizeof($api_result) > 0) {
  echo "<div class='table-wrapper'>
        <table>
          <thead>
          <tr><th>De</th>
          <th>Mensaje</th>
          <th>Fecha de Envío</th>
          <th>Latitud</th>
          <th>Longitud</th></tr>
          </thead>";
  echo "<tbody>";
      foreach ($api_result as $r) {
        require("../config/conexionv2_grupo48.php");
        $sender = $r["sender"];
        $query = "SELECT correo
              FROM Usuarios 
              WHERE uid = $sender";
        $result = $db -> prepare($query);
	      $result -> execute();
        $mail = $result -> fetchAll();
          echo "<tr><td>".$mail[0][0]."</td>";
          echo "<td>".$r["message"]."</td>";
          echo "<td>".$r["date"]."</td>";
          echo "<td>".$r["lat"]."</td>";
          echo "<td>".$r["long"]."</td></tr>";
          } echo "</tbody></table></div>";
} else {echo "No hay datos!";}
#$result = ;
#$nr = pg_num_rows($result);
#if ($nr>0) {
    #echo "<div class='table-wrapper'>
          #<table>
            #<thead>
            #<tr><th>Fecha Inicial</th>
            #<th>Fecha Final</th>
            #<th>Hotel</th>
            #<th>Habitación</th>
            #<th>Precio</th></tr>
            #</thead>";
  #echo "<tbody>";
        #while($filas = pg_fetch_array($result)) {
            #echo "<tr><td>".$filas["fecha_inicio"]."</td>";
            #echo "<td>".$filas["fecha_fin"]."</td>";
            #echo "<td>".$filas["nombre_hotel"]."</td>";
            #echo "<td>".$filas["nombre_habitacion"]."</td>";
            #echo "<td>".$filas["precio"]."</td></tr>";
            #} echo "</tbody></table></div>";
#} else {echo "No hay datos!";}
?>
<br><br>
  <div class="12u$">
      <ul class="actions">
          <form action="../views/messages.php" method="post">
            <input type="submit" value="Volver", style="background:lightblue">
      </ul>
  </div>
  </form>
</body>
