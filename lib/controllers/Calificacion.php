<?php

  class Calificacion{
    private $idLibro;
    private $puntuacion;

    function Calificacion($idLibro,$puntuacion){
      $this->idLibro = $idLibro;
      $this->puntuacion = $puntuacion;
    }

    function crearCalificacion(){
      try {
        include "../services/db_connect.php";

        $query = "insert into calificacion set libro_id = ?, valor = ?";
        $stmt = $conexion->prepare($query);
        $stmt->bindParam(1,$this->idLibro);
        $stmt->bindParam(2,$this->puntuacion);

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
