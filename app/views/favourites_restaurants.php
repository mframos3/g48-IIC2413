<?php include('../templates/header.html');   ?>

<body>
	<section id="banner">
        <h2><strong>Guardar Como Favorito</strong>
	</section>
	
    <section id="one" class="wrapper special">
			<div class="inner">
				<div class="features">
                    <div class="feature", style="background:lightblue">
                        <form action="../queries/add_restaurant.php" method="Post">
                        <input type='hidden' name='restid_input' value='<?php echo strval($_GET["restid"]);?>' required /> 
                        <b>Duración de la Estadía (días):</b>
                        <br><br>  
                        <input type="submit" value="Reservar">
                        </form>
					</div>	
				</div>
			</div>
    </section>
    <br><br>
    <div class="12u$">
      <ul class="actions">
          <form action="../queries/show_hotels.php" method="post">
            <input type="submit" value="Volver A Hoteles">
      </ul>
    </div>
    </form>
</body>


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