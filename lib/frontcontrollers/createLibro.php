<?php

include '../controllers/Libro.php';

$titulo = $_POST["registro-titulo"];
$autor = $_POST["registro-autor"];
$ISBN = $_POST["registro-ISBN"];

$libro = new Libro($titulo,$autor,$ISBN);
$respuesta = $libro->createLibro();

if ($respuesta == "exito") {
  echo "El libro se ha registrado con exito";
}else {
  echo "Error al registrar el libro";
}

?>
