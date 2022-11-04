<?php

class Game
{
  public $id_game;
  public $nombre;
  public $img;
  public $tipo_suscripcion;


  public function crearGame($datosGame){
    $id_game = (obtenerUltimaID('games','id_game') + 1);
    $nombre = $datosGame->nombre;
    $img = $datosGame->img;
    $tipo_suscripcion = $datosGame->tipo_suscripcion;

    $consulta = "INSERT INTO games 
                  VALUES ($id_game,'$nombre','$img','$tipo_suscripcion') ";

    $resultadoConsulta = ejecutarConsulta($consulta, __CLASS__);
    return $resultadoConsulta;
  }


  public static function buscarTodos()
  {
    $consulta = "SELECT * FROM games";

    $resultadoConsulta = ejecutarConsulta($consulta, __CLASS__);
    return $resultadoConsulta;
  }

}

?>
