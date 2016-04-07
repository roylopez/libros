<?php

include '../controllers/Libro.php';

$id = $_GET["id"];

$libro = new Libro();
$libroActual = $libro->getLibro($id);

$ISBN = "";
$titulo =  "";
$autor = "";

foreach ($libroActual as $row) {
  $ISBN = $row['ISBN'];
  $titulo = $row['titulo'];
  $autor = $row['autor'];
}

echo "<form class='form-horizontal revision' action='lib/frontcontrollers/setRevision.php' method='POST'>
  <div class='form-group'>
    <label for='inputEmail3' class='col-sm-2 control-label'>Titulo:</label>
    <div class='col-sm-10'>
      <label for='inputEmail3' class='control-label'>".$titulo."</label>
    </div>
  </div>
  <div class='form-group'>
    <label for='inputEmail3' class='col-sm-2 control-label'>Autor:</label>
    <div class='col-sm-10'>
      <label for='inputEmail3' class='control-label'>".$autor."</label>
    </div>
  </div>
  <div class='form-group'>
    <label for='inputEmail3' class='col-sm-2 control-label'>ISBN:</label>
    <div class='col-sm-10'>
      <label for='inputEmail3' class='control-label'>".$ISBN."</label>
    </div>
  </div>
  <div class='form-group'>
    <label for='inputEmail3' class='col-sm-2 control-label'>Revision:</label>
    <div class='col-sm-8'>
      <div id='summernote'></div>
    </div>
  </div>
  <div class='form-group'>
    <div class='col-sm-offset-2 col-sm-6'>
      <button type='button' class='btn btn-primary' onclick='setRevision(".$id.")'>Enviar</button>
    </div>
  </div>
</form>";

?>
