<?php include('../templates/header.html');   ?>

<?php 
    require("../config/conexionv2_grupo49.php");
    session_start();
    $uid = intval($_SESSION['current_user_id']);
    $restid = intval($_GET['restid_input']);
    $query = "SELECT *
              FROM  RestaurantesFavoritos RF 
              WHERE RF.uid = $uid AND RF.restid = $restid";
    $result = $db -> prepare($query);
	$result -> execute();
    $response = $result -> fetchAll();
    if (sizeof($response) > 0){
        echo "<h2>El restaurante seleccionado ya está entre tus favoritos!</h2>";
    }
    else {
        $insert_query = "INSERT INTO RestaurantesFavoritos  
                         VALUES ($uid, $restid)";
        $result = $db -> prepare($insert_query);
        $result -> execute();
        echo "<h2>Se Ha Guardado Con Éxito!</h2>";
    }
?>
<body>
<br><br>
    <div class="12u$">
      <ul class="actions">
          <form action="show_restaurants.php" method="post">
            <input type="submit" value="Volver A Restaurantes", style="background:lightblue">
      </ul>
      </form>
      <ul class="actions">
          <form action="../views/main.php" method="post">
            <input type="submit" value="Volver A La Página Principal", style="background:lightblue">
      </ul>
      </form>
    </div>
</body>
