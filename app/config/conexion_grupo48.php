<?php
  require("data_grupo48.php");
  function conectarBD() {
    $host="host=localhost";
    $port="port=5432";
    $dbname="dbname=$DBgrupo";
    $user="user=$DBuser";
    $password="password=$DBpassword";

    $db = pg_connect("$host $port $dbname $user $password");
    if (!$db){
      echo "Error: ".pg_last_error;
    } else {

      return $db;}
  }?>