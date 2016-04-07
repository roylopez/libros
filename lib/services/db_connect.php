<?php

$host = "localhost";
$pass = "";
$user = "root";
$database = "libros";

try {
  $conexion = new PDO("mysql:host={$host};dbname={$database}",$user,$pass);
} catch (Exception $e) {
  echo "Fallamos: ".$e->getMessage();
}

?>
