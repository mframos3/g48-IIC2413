<?php include('../templates/header.html');   ?>
	<body>
		<!-- Banner -->
		<section id="banner">
			<h2><strong>Dirección Secreta de Turismo</strong>
			<br/></h2>
			<p><?php session_start(); $current_mail = $_SESSION['current_user_mail']; 
			echo "(".$current_mail.")"; ?></p>
            <div class="inner">
				<form action="profile.php" method="post">
					<input type="submit" value="Perfil">
				</form>
			<div class="inner">
				<form action="logout.php" method="post">
					<input type="submit" value="Cerrar Sesión">
				</form>
        </section>

		<!-- One -->
		<section id="one" class="wrapper special">
			<div class="inner">
				<div class="features">
					<div class="feature", style="background:lightcoral">
						<p>Descubre restaurantes y conoce todos sus platos!</p>
						<form action="../queries/show_restaurants.php" method="post">
							<input type="submit" value="Buscar">
						</form>
					</div>
					<div class="feature", style="background:lightblue">
						<p>Conoce todas las agencias de turismo y los tours que ofrecen!</p>
						<form action="../queries/show_agencies.php" method="post">
							<input type="submit" value="Buscar">
						</form>
					</div>
					<div class="feature", style="background:plum">
							<p>Busca tus vinos favoritos en las viñas del país!</p>
							<form action="../queries/show_vineyards.php" method="post">
								<input type="submit" value="Buscar">
							</form>
						</div>
					<div class="feature", style="background:lightsalmon">
						<p>Elige tu tour de enoturismo ideal para conocer las viñas y vinos que quieras!</p>
						<form action="../queries/show_enotours.php" method="post">
							<input type="submit" value="Buscar">
						</form>
					</div>
					<div class="feature", style="background:lightgreen">
							<p>Infórmate de los senderos y atractivos de nuestros parques nacionales!</p>
							<form action="../queries/show_parks.php" method="post">
								<input type="submit" value="Buscar">
							</form>
						</div>
					<div class="feature", style="background:rgb(252, 252, 86)">
						<p>Averigua sobre hoteles y sus habitaciones!</p>
						<form action="../queries/show_hotels.php" method="post">
							<input type="submit" value="Buscar">
						</form>
					</div>
				</div>
			</div>
        </section>
        
		<!-- Footer -->
			<footer id="footer">
				<div class="copyright">
					&copy; Untitled. Design: <a href="http://templated.co/">TEMPLATED</a>.
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
	</body>
