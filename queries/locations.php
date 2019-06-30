<?php include('../templates/header.html');   ?>

<body>
    <section id="banner">
        <h2><strong>Lugares Según Mensajes Enviados</strong>
        <br/></h2>
        <p>Ingresa un rango de fechas para mostrar los lugares desde los que enviaste mensajes entre dichas fechas!</p>
    </section>
    <section id="one" class="wrapper special">
    <div class="inner">
        <div class="features">
            <div class="feature", style="background:lightseagreen">
                <form action="api_locations.php" method="post">
                <b>Fecha Mínima:</b>
                <input type="date" value="<?php echo date('Y-m-d'); ?>" name="initial_input">
                <br><br>
                <b>Fecha Máxima:</b>
                <input type="date" value="<?php echo date('Y-m-d'); ?>" name="final_input">
                <br><br>
                <input type="submit" value="Buscar">
                </form>
            </div>	
        </div>
    </div>
    </section>

<br><br>
  <div class="12u$">
      <ul class="actions">
          <form action="../views/messages.php" method="post">
            <input type="submit" value="Volver", style="background:lightblue">
      </ul>
  </div>
  </form>
</body>
