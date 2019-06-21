<?php include('../templates/header.html');   ?>
    <body>
	    <section id="banner">
		    <h2><strong>Dirección Secreta de Turismo</strong>
			<br/></h2>
        </section>
        <?php require_once ("../config/conexion_grupo49.php"); $conexion = conectarBD();?>
		<div id="chart"></div>
		<footer id="footer">
            <div class="copyright">
                &copy; Untitled. Design: <a href="http://templated.co/">TEMPLATED</a>.
                <ul class="actions">
                    <form action="../index.php" method="post">
                    <input type="submit" value="Volver", style="background:lightblue">
                </ul>
            </div>
        </footer>

        <script>
            var x = [
                <?php
                    $query = "SELECT R.nombre, COUNT(HA.habid) FROM Regiones R, Habitaciones HA, Hoteles HO WHERE HO.rid = R.rid AND HA.hid = HO.hid GROUP BY R.nombre";
                    $resultado1=pg_query($conexion, $query) or die ("Error en la consulta");
                    while ($filas=pg_fetch_array($resultado)) {
                        $xf = $fila["nombre"];
                        echo "'$xf',";
                    }
                ?>
            ]
            var y = [
                <?php
                    $query = "SELECT R.nombre, COUNT(HA.habid) AS q FROM Regiones R, Habitaciones HA, Hoteles HO WHERE HO.rid = R.rid AND HA.hid = HO.hid GROUP BY R.nombre";
                    $resultado1=pg_query($conexion, $query) or die ("Error en la consulta");
                    while ($filas=pg_fetch_array($resultado)) {
                        $yf = $fila["q"];
                        echo "'$yf',";
                    }
                ?>
            ]



            var chart = c3.generate({
                data: {
                columns: 
                type : 'donut'},
                donut: {
                title: "Dogs love:",
                }});
        </script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
	</body>