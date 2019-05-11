




<!----
Queda pendiente mostrar las habitaciones que ya están pedidas y/o mostrar las que están disponibles
---->

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