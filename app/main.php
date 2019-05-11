
<h1>Reservar una habitacion</h1>



<?php
    session_start();
    echo  $_SESSION['current_user_id'];

?>
<a href="views/reserve_room.php"> Pedir una habitacion</a>

<h1>Actualizar estado de un sendero</h1>


<a href="views/update_state_path.php">Ir a actualizar estado de un sendero</a>



<h1>Mis hoteles favoritos</h1>


<a href="views/favourites_hotels.php">Ver mis hoteles favoritos</a>