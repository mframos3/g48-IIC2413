<?php include('../templates/header.html');   ?>

<body>
    <section id="banner">
        <h2><strong>Perfil</strong>
        <br/></h2>
        <p>Nombre?</p>
    </section>
    
    <section id="one" class="wrapper special">
			<div class="inner">
				<div class="features">
					<div class="feature">
						<p>Reservas de Habitaciones Realizadas</p>
						<form action="../queries/show_reserves.php" method="post">
							<input type="submit" value="Ver">
						</form>
					</div>
					<div class="feature">
						<p>Senderos Realizados</p>
						<form action="../queries/show_trails.php" method="post">
							<input type="submit" value="Ver">
						</form>
					</div>
					<div class="feature">
                        <p>Restaurantes Favoritos</p>
					    <form action="../queries/get_restaurants.php" method="post">
							<input type="submit" value="Ver">
						</form>
					</div>	
				</div>
			</div>
    </section>
    
<?php include('../templates/footer.html'); ?>
