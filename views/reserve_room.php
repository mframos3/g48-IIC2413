<?php include('../templates/header.html');   ?>

<body>
	<section id="banner">
        <h2><strong>Reservar Habitación</strong>
	</section>
	
    <section id="one" class="wrapper special">
			<div class="inner">
				<div class="features">
          <div class="feature", style="background:lightseagreen">
          <form action="../queries/get_a_room.php" method="Post">
          <input type='hidden' name='habid_input' value='<?php echo strval($_GET["habid"]);?>' required /> 
          <b>Duración de la Estadía (Días):</b>
          <input type="number" min="1" step="1" pattern="\d+"name="duration_input" required />
          <br><br>  
          <input type="submit" value="Reservar">
          </form>
					</div>	
				</div>
			</div>
    </section>
    <br><br>
    <div class="12u$">
      <ul class="actions">
          <form action="../queries/show_hotels.php" method="post">
            <input type="submit" value="Volver A Hoteles", style="background:lightblue">
      </ul>
    </div>
    </form>
</body>
