<?php include('../templates/header.html');   ?>

<body>
	<section id="banner">
        <h2><strong>Registrar Sendero</strong>
	</section>
	
    <section id="one" class="wrapper special">
			<div class="inner">
				<div class="features">
                    <div class="feature", style="background:lightblue">
                        <form action="../queries/add_trails.php" method="Post">
                        <input type='hidden' name='sid' value='<?php echo strval($_GET["sid"]);?>' required /> 
                        <b>Duración de la Estadía en el Sendero (días):</b>
                        <input type="number" min="1" step="1" pattern="\d+"name="duration_input" required />
                        <br><br>
                        <b>Estado:</b>
                        <select name="state" required />
                            <option value="en ruta" selected>En Ruta</option>
                            <option value="finalizado">Finalizado</option>
                            <option value="perdido">Perdido</option>
                        </select>
                        <br><br>  
                        <input type="submit" value="Registrar">
                        </form>
					</div>	
				</div>
			</div>
    </section>
    <br><br>
    <div class="12u$">
      <ul class="actions">
          <form action="../queries/show_parks.php" method="post">
            <input type="submit" value="Volver A Parques">
      </ul>
    </div>
    </form>
</body>
