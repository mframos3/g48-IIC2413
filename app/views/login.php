<?php include('../templates/header.html');   ?>

<body>
	<section id="banner">
        <h2><strong>Ingresa tus Datos</strong>
	</section>
	
    <section id="one" class="wrapper special">
			<div class="inner">
				<div class="features">
					<div class="feature", style="background:lightseagreen">
					    <form action="../queries/get_data.php" method="post">
						<b>Correo:</b>
						<input type="text" name="username">
						<b>Contraseña:</b>
						<input type="password" name="password">
						<br>
                        <input type="submit" value="Entrar">
						</form>
					</div>	
				</div>
			</div>
    </section>

<?php include('../templates/footer.html'); ?>
