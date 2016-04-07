<?php

include '../controllers/Calificacion.php';

$idLibro = $_POST["libro"];
$calificacion = $_POST["calificacion"];

$calificacion = new Calificacion($idLibro,$calificacion);
$respuesta = $calificacion->crearCalificacion();

if ($respuesta == "exito") {
  echo "Su puntuación se ha registrado con exito";
}else {
  echo "Error al registrar la puntuación";
}

?>
