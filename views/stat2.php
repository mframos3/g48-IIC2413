<?php include('../templates/header.html');   ?>
    <body>
	    <section id="banner">
		    <h2><strong>Dirección Secreta de Turismo</strong>
			<br/> Estadísticas</h2>
        </section>
        <?php require_once ("../config/conexion_grupo48.php"); $conexion = conectarBD();?>
        <br>
        <h1><strong>Gráfico de barras: Cantidad de cepas por región</strong></h1>
        <br>
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
            <?php
                    $query = "SELECT R.rnombre, COUNT(DISTINCT VI.cepa) AS cantidad
                    FROM Regiones R, Vinos VI, Vinas V
                    WHERE VI.vid = V.vid AND V.rid = R.rid
                    GROUP BY R.rnombre";
                    $resultado1=pg_query($conexion, $query) or die ("Error en la consulta");
                    $filas=pg_fetch_all($resultado1);
                    $data = json_encode($filas);
                ?>
        <script>
            var jsondata = <?php echo $data ?>;
            var length = jsondata.length;
            for (var i = 0; i < length - 1; i ++) {
                jsondata[i].cantidad = parseInt(jsondata[i].cantidad);
            }

        </script>
        <script>
           var chart = c3.generate({
  data: {
    json: jsondata,
    type : 'bar',
    keys: {
      x: 'rnombre', // it's possible to specify 'x' when category axis
      value: ['cantidad'],
    }
  },
  legend: {
        show: false
    }, 
  axis: {
    x: {
      type: 'category'
    }
  }
});
        </script>
	</body>