<?php

class Suscripcion{
    
    public $id_suscripcion;
    public $tipo_suscripcion;
    public $nivel;
    public $precio;

    public static function buscarTodas(){
        $consulta = "SELECT tipo_suscripcion,precio FROM suscripciones";
        $resultadoConsulta = ejecutarConsulta($consulta, __CLASS__);
        return $resultadoConsulta;
    }


    public function eliminarSuscripcion($emailUsuario){
        $consulta = "UPDATE usuarios SET tipo_suscripcion = 'gratis' 
                    WHERE email = '$emailUsuario'";
        $resultadoConsulta = ejecutarConsulta($consulta, __CLASS__);
        return $resultadoConsulta;
    }

    public function actualizarSuscripcion($emailUsuario,$tipo_subscripcion){
        $consulta = "UPDATE usuarios SET tipo_suscripcion = '$tipo_subscripcion' 
                    WHERE email = '$emailUsuario'";
        $resultadoConsulta = ejecutarConsulta($consulta, __CLASS__);
        return $resultadoConsulta;
    }


    public function crearSuscripcion($objetoSuscripcion){
        $id_suscripcion = (obtenerUltimaID('games','id_game') + 1);
        $tipo_suscripcion = $objetoSuscripcion->tipo_suscripcion;
        $nivel = $objetoSuscripcion->nivel;
        $precio = $objetoSuscripcion->precio;
       
        $consulta = "INSERT INTO suscripciones 
                    VALUES ($id_suscripcion,'$tipo_suscripcion','$nivel','$precio') ";

        $resultadoConsulta = ejecutarConsulta($consulta, __CLASS__);
        return $resultadoConsulta;
    }

    public function buscarSuscripcionUsuario($emailUsuario){
        $consulta = "SELECT nombre,apellido,tipo_suscripcion FROM usuarios
                     WHERE email = '$emailUsuario'";
        $resultadoConsulta = ejecutarConsulta($consulta, __CLASS__);
        return $resultadoConsulta;
    }   
}

?>
