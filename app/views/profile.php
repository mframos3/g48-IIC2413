<?php include('../templates/header.html');   ?>

<body>
    <section id="banner">
        <h2><strong>Perfil</strong>
        <br/></h2>
        <p><strong>Nombre: <?php session_start(); 
								$current_name = $_SESSION['current_user_name'];
                echo $current_name; ?> </strong></p>
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
	<br><br>
    <div class="12u$">
      <ul class="actions">
          <form action="main.php" method="post">
            <input type="submit" value="Volver">
      </ul>
    </div>
    </form>
</body>
