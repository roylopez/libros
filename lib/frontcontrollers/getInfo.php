<?php
  include '../controllers/Libro.php';

  $idLibro = $_GET["id"];
  $promedioCalificaciones = 0;

  $libro = new Libro();
  $respuesta = $libro->getPuntuaciones($idLibro);
  $iter = 1;

  $html = "<h2>Puntuaciones</h2><div class='panel panel-default'>".
              "<div class='panel-body'>".
                "<table class='table table-hover'>".
                  "<thead><th>#</th><th>Puntuación</th></thead><tbody>";
  foreach ($respuesta as $row) {
    $html .="";
    $html .="<tr><td>".$iter."</td><td>".$row['valor']."</td></tr>";
    $iter= $iter+1;
    $promedioCalificaciones = $promedioCalificaciones + $row['valor'];
  }
  $promedioCalificaciones = $promedioCalificaciones/($iter-1);
  $html .= "<tr><th>Promedio</th><th>".$promedioCalificaciones."</th></tr></tbody>".
              "</table></div></div><h2>Revisiones</h2>".
                "<div class='panel-group' id='accordion' role='tablist' aria-multiselectable='true'>";

  $respuesta = $libro->getRevisiones($idLibro);
  $iter=1;

  foreach ($respuesta as $row) {
    $html.="<div class='panel panel-info'>";
      $html.="<div class='panel-heading' role='tab' id='headingLibro".$iter."'>".
              "<a role='button' data-toggle='collapse' data-parent='#accordion' href='#registroRevision".$iter."' aria-controls='registroRevision".$iter."'>".
                "Revision ".$iter.
              "</a>".
            "</div>";
      $html.="<div id='registroRevision".$iter."' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingLibro".$iter."'>".
                "<div class='panel-body'>".$row['texto']."</div>";
    $html.="</div></div>";
    $iter = $iter + 1;
  }
  $html .= "</div>";

  echo $html;
?>
