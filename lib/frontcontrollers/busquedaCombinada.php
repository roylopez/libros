<?php
  include '../controllers/Libro.php';

  $autor = $_GET["combinada-autor"];
  $titulo = $_GET["combinada-titulo"];
  $ISBN = $_GET["combinada-ISBN"];

  $libro = new Libro();
  $resultado = $libro->getLibroBusquedaCombinada($autor,$titulo,$ISBN);

  $html = "";
  foreach ($resultado as $row) {
    $html .="<div class='panel panel-danger col-md-4 col-md-offset-4'>";
      $html.="<div class='panel-heading'>".$row['titulo']."</div>";
      $html.="<div>".$row['autor']." | ".$row['ISBN']."</div>";
      $html.="<div class='panel-body'><a href='javascript:void(0)' onclick='getInfo(".$row['id'].")'><img class='img img-responsive' src='resources/img/libro.png'/></a>"."</div>";
      $html.="<div class='panel-footer'>"."<a class='btn btn-primary' onclick='revision(".$row['id'].")'>Realizar revision</a>"."  <a class='btn btn-primary' onclick='puntuacion(".$row['id'].")'>Puntuar</a>"."</div>";
    $html .="</div>";
  }
  echo $html;

 ?>
