<?php include('templates/header.html');   ?>
<!DOCTYPE HTML>
<!--
    Based on Visualize by TEMPLATED
    From templated.co (@templatedco)
-->
<html>
	<body>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
                        <h1 style="font-size:300%;font-family:Helvetica"><strong>Entrega 2</strong></h1>
                        <span class="avatar"><img src="images/avatar1.png" alt="" /></span>
                        <span class="avatar"><img src="images/avatar2.png" alt="" /></span>
					</header>

				<!-- Main -->
					<section id="main">

						<!-- Thumbnails -->
							<section class="thumbnails">
								<div>
									<a>
										<img src="images/thumbs/01.jpg" alt="" />
										<h3>Consulta 1: Senderos por Usuario
                                        <form action="queries/query_1.php" method="post">
                                            Ingrese el ID del usuario:<br>
                                            <input type="text" name="uid"><br>
                                            <input type="submit" name="Consulta_1" value="Consultar">
                                        </form> 
                                        </h3>
                                    </a>
                                    <a>
										<img src="images/thumbs/04.jpeg" alt="" />
										<h3>Consulta 4: Vino Más Caro
                                        <form action="queries/query_4.php" method="post">
                                        <input type="submit" name="Consulta_4" value="Consultar">
                                        </form>
                                        </h3>
                                    </a>
                                    <a>
										<img src="images/thumbs/07.jpg" alt="" />
										<h3>Consulta 7: Senderos y Kilómetros de Recorrido de un Parque
                                        <form action="queries/query_7.php" method="post">
                                        <br>Ingrese el ID del parque:
                                        <input type="text" name="id_parque">
                                        <br>
                                        <input type="submit" name="Consulta_7" value="Consultar">
                                        </form>
                                        </h3>
                                    </a>
								</div>
								<div>
                                    <a>
										<img src="images/thumbs/02.jpg" alt="" />
										<h3>Consulta 2: Viñas y Parques por Región
                                        <form action="queries/query_2.php" method="post">
                                            Ingrese el ID de la región:<br>
                                            <input type="text" name="rid"><br>
                                            <input type="submit" name="Consulta_2" value="Consultar"><br>
                                        </form> 
                                        </h3>
									</a>
									<a>
										<img src="images/thumbs/05.jpg" alt="" />
										<h3>Consulta 5: Usuarios en Ruta en el Sendero Más Largo<br>
                                        <form action="queries/query_5.php" method="post">
                                        <input type="submit" name="Consulta_5" value="Consultar">
                                        </form>
                                        </h3>
                                    </a>
                                    <a>
										<img src="images/thumbs/08.jpg" alt="" />
										<h3>Consulta 8: I-ésimo Sendero Más Largo<br>
                                        <form action="queries/query_8.php" method="post">
                                        Ingrese el i para obtener el i-ésimo sendero más largo: 
                                        <input type="text" name="i_esimo_sendero">
                                        <br>
                                        <input type="submit" name="Consulta_8" value="Consultar">
                                        </form>
                                        </h3>
									</a>
								</div>
								<div>
                                    <a>
										<img src="images/thumbs/03.jpg" alt="" />
										<h3>Consulta 3: Vinos por Tour y Cepa
                                        <form action="queries/query_3.php" method="post">
                                            Ingrese el nombre del tour:
                                            <input type="text" name="tnombre">
                                            <br>Ingrese la cepa del vino:
                                            <input type="text" name="cepa">
                                            <br> <input type="submit" name="Consulta_3" value="Consultar">
                                        </form>
                                        </h3>
									</a>
									<a>
										<img src="images/thumbs/06.jpg" alt="" />
										<h3>Consulta 6: Senderos con Mayor Cantidad de Gente Perdida<br>
                                        <form action="queries/query_6.php" method="post">
                                        <input type="submit" name="Consulta_6" value="Consultar">
                                        </form>
                                        </h3>
									</a>
								</div>
							</section>

                    </section>
                
                <!-- Footer -->
					<footer id="footer">
						<p>&copy; Based on Visualize by TEMPLATED From 
                            templated.co (@templatedco) </a>.</p>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>

</html>
