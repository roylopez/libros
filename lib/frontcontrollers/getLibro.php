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

echo "<form class='form-horizontal puntuacion' action='lib/frontcontrollers/setPuntuacion.php' method='POST'>
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
    <label for='inputEmail3' class='col-sm-2 control-label'>Tu puntuación:</label>
    <div class='col-sm-3'>
      <select name='calificacion' class='form-control calificacion'>
        <option value='1'>1</option>
        <option value='2'>2</option>
        <option value='3'>3</option>
        <option value='4'>4</option>
        <option value='5'>5</option>
      </select>
    </div>
  </div>
  <div class='form-group'>
    <div class='col-sm-offset-2 col-sm-6'>
      <button type='button' class='btn btn-primary' onclick='setPuntuacion(".$id.")'>Puntuar</button>
    </div>
  </div>
</form>";

?>
