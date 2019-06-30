<?php include('../templates/header.html');   ?>

<body>
    <section id="banner">
        <h2><strong>Enviar Mensaje</strong>
        <br/></h2>
    </section>
    <section id="one" class="wrapper special">
    <div class="inner">
        <div class="features">
            <div class="feature", style="background:lightblue">
                <form action="api_send.php" method="post">
                <b>Email De Destino:</b>
                <input type="text" name="mail_input">
                <b>Mensaje:</b>
                <input type="text" name="message_input">
                <br>
                <input type="submit" value="Enviar">
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
