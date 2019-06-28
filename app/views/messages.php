<?php include('../templates/header.html');   ?>

<body>
    <section id="banner">
        <h2><strong>Mensajería</strong>
        <br/></h2>
    </section>
    
    <section id="one" class="wrapper special">
			<div class="inner">
				<div class="features">
					<div class="feature", style="background:lightcoral">
						<p>Recibidos</p>
						<form action="../queries/show_inbox.php" method="post">
							<input type="submit" value="Ver">
						</form>
					</div>
					<div class="feature", style="background:lightblue">
						<p>Enviados</p>
						<form action="../queries/show_sent.php" method="post">
							<input type="submit" value="Ver">
						</form>
					</div>
                    <div class="feature", style="background:rgb(252, 252, 86)">
						<p>Enviar Mensaje</p>
						<form action="../queries/send_message.php" method="post">
							<input type="submit" value="Ir">
						</form>
					</div>
                    <div class="feature", style="background:plum">
						<p>Buscar Mensajes</p>
						<form action="../queries/search_messages.php" method="post">
							<input type="submit" value="Ir">
						</form>
					</div>
                    <div class="feature", style="background:lightgreen">
						<p>Buscar Lugares Según Fecha De Creación De Mensajes</p>
						<form action="../queries/locations.php" method="post">
							<input type="submit" value="Ir">
						</form>
					</div>
				</div>
			</div>
	</section>
	<br><br>
    <div class="12u$">
      <ul class="actions">
          <form action="main.php" method="post">
            <input type="submit" value="Volver", style="background:lightblue">
      </ul>
    </div>
    </form>
</body>
