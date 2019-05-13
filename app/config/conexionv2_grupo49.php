<?php
  function conectarBD() {
    $host="host=localhost";
    $port="port=5432";
    $dbname="dbname=grupo49";
    $user="user=grupo49";
    $password="password=qweasd123";

    $db = pg_connect("$host $port $dbname $user $password");
    if (!$db){
      echo "Error: ".pg_last_error;
    } else {

      return $db;}
  } ?>
