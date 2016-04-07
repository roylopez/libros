<?php

include '../controllers/Revision.php';

$idLibro = $_POST["libro"];
$calificacion = $_POST["revision"];

$revision = new Revision($idLibro,$calificacion);
$respuesta = $revision->crearRevision();

if ($respuesta == "exito") {
  echo "Su revisión se ha enviado con exito";
}else {
  echo "Error al enviar la revisión";
}

?>
