<?php
class Libro{

  private $titulo;
  private $autor;
  private $ISBN;

  function Libro($titulo="def",$autor="def",$ISBN="def"){
    $this->titulo = $titulo;
    $this->autor = $autor;
    $this->ISBN = $ISBN;
  }

  function getLibrosTitulo($busqueda){
    include "../services/db_connect.php";
    $query = "select * from libro where titulo like '%".$busqueda."%'";
    $result = $conexion->query($query);
    return $result;
  }

  function getLibrosAutor($busqueda){
    include "../services/db_connect.php";
    $query = "select * from libro where autor like '%".$busqueda."%'";
    $result = $conexion->query($query);
    return $result;
  }

  function getLibro($id){
    include "../services/db_connect.php";
    $query = "select * from libro where id =".$id;
    $result = $conexion->query($query);
    return $result;
  }

  function getLibroBusquedaCombinada($autor,$titulo,$ISBN){
    include "../services/db_connect.php";
    $query = "select * from libro where autor ='".$autor."' and titulo ='".$titulo."' and ISBN='".$ISBN."'";
    $result = $conexion->query($query);
    return $result;
  }

  function getPuntuaciones($id){
    include "../services/db_connect.php";
    $query = "select * from calificacion where libro_id=".$id;
    $result = $conexion->query($query);
    return $result;
  }

  function getRevisiones($id){
    include "../services/db_connect.php";
    $query = "select * from revision where libro_id=".$id;
    $result = $conexion->query($query);
    return $result;
  }

  function createLibro(){
    try {
      include "../services/db_connect.php";

      $query = "insert into libro set ISBN = ?, titulo = ?, autor=?";
      $stmt = $conexion->prepare($query);
      $stmt->bindParam(1,$this->ISBN);
      $stmt->bindParam(2,$this->titulo);
      $stmt->bindParam(3,$this->autor);

      if ($stmt->execute()) {
        return "exito";
      }else{
        return "error";
      }
    } catch (Exception $e) {
      echo "Error: ".$e->getMessage();
    }
  }

}
?>
