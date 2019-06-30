<?php include('../templates/header.html'); ?>
    <body>
	    <section id="banner">
		    <h2><strong>Dirección Secreta de Turismo</strong>
			<br/> Estadísticas</h2>
        </section>
        <?php require_once ("../config/conexion_grupo49.php"); $conexion = conectarBD();
        session_start();
        if (isset($_SESSION["current_user_id"])) {
          $s = "main.php";
        } else {
          $s = "../index.php";
        }?>
        <br>
        <h1><strong>Gráfico de Barras: Cantidad de Reservas de Habitaciones por Región</strong></h1>
        <br>
        <div id="chart"></div>
		<footer id="footer">
            <div class="copyright">
                &copy; Untitled. Design: <a href="http://templated.co/">TEMPLATED</a>.
                <ul class="actions">
                    <form action=<?php echo $s?> method="post">
                    <input type="submit" value="Volver", style="background:lightblue">
                </ul>
            </div>
        </footer>
            <?php
                    $query = "SELECT R.nombre, COUNT(RE.resvid) AS cantidad
                                FROM Regiones R, Habitaciones HA, Hoteles HO, Reservas RE
                                WHERE HO.rid = R.rid AND HA.hid = HO.hid AND HA.habid = RE.habid
                                GROUP BY R.nombre";
                    $resultado1=pg_query($conexion, $query) or die ("Error en la consulta");
                    $filas=pg_fetch_all($resultado1);
                    $data = json_encode($filas);
                ?>
        <script>
            var jsondata = <?php echo $data ?>;
            for (var i = 0; i < 16; i ++) {
                jsondata[i].cantidad = parseInt(jsondata[i].cantidad);
            }
        </script>
        <script>
           var chart = c3.generate({
  data: {
    json: jsondata,
    type : 'bar',
    keys: {
      x: 'nombre', // it's possible to specify 'x' when category axis
      value: ['cantidad'],
    }
  },
  axis: {
    x: {
      type: 'category'
    }
  }
});
        </script>
  </body>
