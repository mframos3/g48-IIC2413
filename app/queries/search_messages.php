<?php include('../templates/header.html');   ?>

<body>
    <section id="banner">
        <h2><strong>Buscar Mensajes</strong>
        <br/></h2>
        <p>Para Ingresar Varias Frases o Palabras Debes Separarlas Utilizando El Símbolo %</p>
    </section>
    <section id="one" class="wrapper special">
    <div class="inner">
        <div class="features">
            <div class="feature", style="background:lightblue">
                <form action="api_search.php" method="post">
                <b>Email De Origen (dejar vacío para buscar en todos los mensajes):</b>
                <input type="text" name="mail_input">
                <b>Frases Obligatorias (deben estar en el mensaje sí o sí):</b>
                <input type="text" name="message_input">
                <b>Palabras Opcionales (pueden estar en el mensaje):</b>
                <input type="text" name="message_input">
                <b>Palabras Prohibidas (NO deben estar en el mensaje):</b>
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