<?php

  class Revision{
    private $idLibro;
    private $revision;

    function Revision($idLibro,$revision){
      $this->idLibro = $idLibro;
      $this->revision = $revision;
    }

    function crearRevision(){
      try {
        include "../services/db_connect.php";

        $query = "insert into revision set libro_id = ?, texto = ?";
        $stmt = $conexion->prepare($query);
        $stmt->bindParam(1,$this->idLibro);
        $stmt->bindParam(2,$this->revision);

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
