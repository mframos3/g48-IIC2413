<h1>Entrega 3: Base de datos</h1>


<a href="login.php">Iniciar sesion</a>



<!----
Mostrar las cosas correspondientes a cuando no está loggeado
---->
<form action="queries/wine_wineyards_query.php" method="Post">
    <h2>Mostrar los vinos</h2>
    <input type="submit" name="Consulta_vinos" value="Consultar">
</form>

<br>

<form action="queries/parks_query.php" method="Post">
    <h2>Mostrar los parques con sus senderos y sus atractivos</h2>
    <input type="submit" name="Consulta_parques" value="Consultar">
</form>