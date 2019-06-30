<?php
  try {
    $db = new PDO("pgsql:dbname=grupo49;host=localhost;port=5432;user=grupo49;password=qweasd123");
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }
?>
