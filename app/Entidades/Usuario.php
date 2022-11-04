<?php

class Usuario{

    public $id_usuario;
    public $email;
    public $password;
    public $nombre;
    public $apellido;
    public $tipo_suscripcion;

    public static function buscarTodos(){
        $consulta = "SELECT nombre,apellido,tipo_suscripcion FROM usuarios";
        $resultadoConsulta = ejecutarConsulta($consulta, __CLASS__);
        return $resultadoConsulta;
    }

    public static function buscarUsuarioLogueado($emailUsuario){
        //print_r($emailUsuario);
        $consulta = "SELECT email,nombre,apellido,tipo_suscripcion FROM usuarios
                     WHERE email = '$emailUsuario'";
                     //print_r($consulta);
        $resultadoConsulta = ejecutarConsulta($consulta, __CLASS__);
        return $resultadoConsulta;
        
    }

    public function eliminarUsuario($emailUsuario){
        $consulta = "DELETE FROM usuarios WHERE email = '$emailUsuario'";
        $resultadoConsulta = ejecutarConsulta($consulta, __CLASS__);
        return $resultadoConsulta;
    }

    public function actualizarPass($email, $passVieja, $passNueva){
        $consultaPassVieja = "SELECT * FROM usuarios 
                              WHERE email = '$email' AND 
                              password = '$passVieja'";

        $resultadoConsulta = ejecutarConsulta($consultaPassVieja, __CLASS__); 
                          
        if ($consultaPassVieja) {
            $consultaPassNueva = "UPDATE usuarios 
                                  SET password = '$passNueva' 
                                  WHERE email = '$email' ";
            $resultadoConsulta = ejecutarConsulta($consultaPassNueva, __CLASS__);
            return $resultadoConsulta;
        }
        //ver una forma de manejar error
        return 'error Contraseña no coincide'; 
    }

    public function crearUsuario($datosUsuario){
        $id_usuario = (obtenerUltimaID('usuarios','id_usuario') + 1);
        $email = $datosUsuario->email;
        $password = $datosUsuario->password;
        $nombre = $datosUsuario->nombre;
        $apellido = $datosUsuario->apellido;
        $tipo_suscripcion = $datosUsuario->tipo_suscripcion;

        $consulta = "INSERT INTO usuarios 
                    VALUES ($id_usuario,'$email','$password','$nombre','$apellido','$tipo_suscripcion') ";

        $resultadoConsulta = ejecutarConsulta($consulta, __CLASS__);
        return $resultadoConsulta;
    }

    public static function buscarIdUsuario($emailUsuario){
        $consultaInicial = "SELECT id_usuario 
                            FROM usuarios
                            WHERE email = '$emailUsuario'";
        $resultadoConsulta = ejecutarConsulta($consultaInicial, __CLASS__);
        return $resultadoConsulta[0]->id_usuario;
    }
}
