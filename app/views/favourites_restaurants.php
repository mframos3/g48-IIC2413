

<h1>Hoteles Favoritos</h1>

<form action="../queries/get_restaurants.php" method="post">
<input type="submit" value="Mostrar">
</form>

<br>

<form action="../queries/add_restaurant.php" method="post">
<input type="number" min="1" step="1" pattern="\d+" name="restid_input" required />
<input type="submit" value="Agregar"/>
</form>
<a href="../main.php">Atras</a>