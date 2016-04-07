$(document).on("ready",function(){

  $(".busqueda-simple").on("submit",function(e){
    e.preventDefault();
  });

  $(".puntuacion").on("submit",function(e){
    e.preventDefault();
  });

  $(".revision").on("submit",function(e){
    e.preventDefault();
  });

  $(".busqueda-titulo").on("click",function(){
    clean();
    var bus = $("#inputFrase").val();
    $.get($(".busqueda-simple").attr("action"),{busqueda:bus,tipo:'titulo'},function(data){
      if (data=="") {
        $(".resultados").html("<span class='label label-danger'>**No se han encontrado resultados**</span>");
      }else{
        $(".resultados").html(data);
      }
    });
  });

  $(".busqueda-autor").on("click",function(){
    clean();
    var bus = $("#inputFrase").val();
    $.get($(".busqueda-simple").attr("action"),{busqueda:bus,tipo:'autor'},function(data){
      if (data=="") {
        $(".resultados").html("<span class='label label-danger'>**No se han encontrado resultados**</span>");
      }else{
        $(".resultados").html(data);
      }
    });
  });

  $(".busqueda-combinada").on("submit",function(e){
    clean();
    e.preventDefault();
    $.get($(this).attr("action"),$(this).serialize(),function(data){
      if (data=="") {
        $(".resultados").html("<span class='label label-danger'>**No se han encontrado resultados**</span>");
      }else{
        $(".resultados").html(data);
      }
    });
  });

  $(".registro-libro").on("submit",function(e){
    clean();
    e.preventDefault();
    $.post($(this).attr("action"),$(this).serialize(),function(data){
      $(".resultados").html(data);
    });
  });

});

function puntuacion(idLibro){
  clean();
  $.get("lib/frontcontrollers/getLibro.php",{id:idLibro},function(data){
    $(".resultados").html(data);
  });
}

function setPuntuacion(idLibro){
  var puntos = $(".calificacion").val();
  $.post($(".puntuacion").attr("action"),{calificacion:puntos,libro:idLibro},function(data){
    $(".resultados").html(data);
  });
}

function revision(idLibro){
  clean();
  $.get("lib/frontcontrollers/getLibroRevision.php",{id:idLibro},function(data){
    $(".resultados").html(data);
    $("#summernote").summernote();
  });
}

function setRevision(idLibro){
  var review = $('#summernote').summernote('code');
  $.post($(".revision").attr("action"),{revision:review,libro:idLibro},function(data){
    $(".resultados").html(data);
  });
}

function getInfo(idLibro){
  $.get("lib/frontcontrollers/getInfo.php",{id:idLibro},function(data){
    $(".libro-info").html(data);
  });
}

function clean(){
  $(".libro-info").html("");
}
