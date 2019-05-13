<?php
  function conectarBD() {
    $host="host=localhost";
    $port="port=5432";
    $dbname="dbname=grupo48";
    $user="user=grupo48";
    $password="password=grupo48";

    $db = pg_connect("$host $port $dbname $user $password");
    if (!$db){
      echo "Error: ".pg_last_error;
    } else {

      return $db;}
  }?>
