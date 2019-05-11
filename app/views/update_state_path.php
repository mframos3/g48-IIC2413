
<h1>Actualizar Senderos</h1>

<!-----
Queda pendiente mostrar los senderos en los que está inscrito
---->

<form action="../queries/update_paths.php" method="Post">
    <h2>Ingresa el id del sendero al que quieres actualizar tu estado</h2> 
<input type="number" min="1" step="1" pattern="\d+" name="habid_input" required />
<br>
<h3>Ingresa el estado en el que está este sendero</h3>
    <input type="text" name="state" require/>
    <input type="submit" value="Reservar">
</form>



<a href="../main.php">Atras</a>