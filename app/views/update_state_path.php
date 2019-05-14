<?php include('../templates/header.html');   ?>

<body>
	<section id="banner">
        <h2><strong>Actualizar Sendero</strong>
	</section>
	
    <section id="one" class="wrapper special">
			<div class="inner">
				<div class="features">
          <div class="feature", style="background:lightseagreen">
          <form action="../queries/update_paths.php" method="Post">
          <input type='hidden' name='regid' value='<?php echo strval($_GET["regid"]);?>' required /> 
          <b>Nuevo Estado:</b>
          <select name="state" required />
            <option value="en ruta" selected>En Ruta</option>
            <option value="finalizado">Finalizado</option>
            <option value="perdido">Perdido</option>
          </select>
          <br><br>  
          <input type="submit" value="Actualizar">
          </form>
					</div>	
				</div>
			</div>
    </section>
    <br><br>
    <div class="12u$">
      <ul class="actions">
          <form action="../queries/show_trails.php" method="post">
            <input type="submit" value="Volver", style="background:lightblue">
      </ul>
    </div>
    </form>
</body>
