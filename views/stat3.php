<?php include('../templates/header.html');   ?>
    <body>
	    <section id="banner">
		    <h2><strong>Dirección Secreta de Turismo</strong>
			<br/> Estadísticas</h2>
        </section>
        <?php require_once ("../config/conexion_grupo48.php"); $conexion = conectarBD();
        session_start();
        if (isset($_SESSION["current_user_id"])) {
          $s = "main.php";
        } else {
          $s = "../index.php";}
        ?>
        <br>
        <h1><strong>Gráfico de Torta: Proporción de Cepas de Vino del País</strong></h1>
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
                    $query = "SELECT VI.cepa, COUNT(*) AS cantidad
                    FROM Vinos VI
                    GROUP BY VI.cepa";
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
            var data = {};
            var cepas = [];
            jsondata.forEach(function(e) {
                cepas.push(e.cepa);
                data[e.cepa] = e.cantidad;
            })

        </script>
        <script>
        var chart = c3.generate({
    data: {
        // iris data from R
        json: [ data ],
        keys: {
            value: cepas,
        },
        type : 'pie',
        onclick: function (d, i) { console.log("onclick", d, i); },
        onmouseover: function (d, i) { console.log("onmouseover", d, i); },
        onmouseout: function (d, i) { console.log("onmouseout", d, i); }
    }
});
        </script>
    </body>
