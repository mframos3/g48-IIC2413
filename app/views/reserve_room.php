


<form action="../queries/show_avaliable_rooms.php" method="Post">
    <h2>Mostrar habitaciones disponibles por hotel</h2>
    <input type="submit" value="Consultar">
</form>


<form action="../queries/get_a_room.php" method="Post">
    <h2>Pide la habitacion</h2>
    <h3>Ingresa el id de la habitación</h3>   

<input type="number" min="1" step="1" pattern="\d+" name="habid_input" required />

<br>
<h3>Cantidad de días por la que se reserva</h3>
<input type="number" min="1" step="1" pattern="\d+"name="duration_input" required />




    <input type="submit" value="Reservar">
</form>




<a href="../main.php">Atras</a>