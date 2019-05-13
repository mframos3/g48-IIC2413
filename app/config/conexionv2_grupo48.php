<?php
  try {
    $db = new PDO("pgsql:dbname=grupo48;host=localhost;port=5432;user=grupo48;password=grupo48");
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }
?>
