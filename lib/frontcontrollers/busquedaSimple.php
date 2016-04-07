<?php
  include '../controllers/Libro.php';

  $busqueda = $_GET["busqueda"];
  $tipo = $_GET["tipo"];

  if($tipo == "titulo"){
    $libro = new Libro();
    $libros = $libro->getLibrosTitulo($busqueda);

    $html = "";

    foreach ($libros as $row) {
      $html .="<div class='panel panel-danger col-md-3'>";
        $html.="<div class='panel-heading'>".$row['titulo']."</div>";
        $html.="<div>".$row['autor']." | ".$row['ISBN']."</div>";
        $html.="<div class='panel-body'><img class='img img-responsive' src='resources/img/libro.png'/>"."</div>";
        $html.="<div class='panel-footer'>"."<a class='btn btn-primary' onclick='revision(".$row['id'].")'>Realizar revision</a>"."  <a class='btn btn-primary' onclick='puntuacion(".$row['id'].")'>Puntuar</a>"."</div>";
      $html .="</div>";
    }
    echo $html;

  }elseif ($tipo == "autor") {
    $libro = new Libro();
    $libros = $libro->getLibrosAutor($busqueda);

    $html = "";

    foreach ($libros as $row) {
      $html .="<div class='panel panel-danger col-md-3'>";
        $html.="<div class='panel-heading'>".$row['titulo']."</div>";
        $html.="<div>".$row['autor']." | ".$row['ISBN']."</div>";
        $html.="<div class='panel-body'><img class='img img-responsive' src='img/libro.png'/>"."</div>";
        $html.="<div class='panel-footer'>"."<a class='btn btn-primary' onclick='revision(".$row['id'].")'>Realizar revision</a>"."  <a class='btn btn-primary' onclick='puntuacion(".$row['id'].")'>Puntuar</a>"."</div>";
      $html .="</div>";
    }
    echo $html;
  }

 ?>
