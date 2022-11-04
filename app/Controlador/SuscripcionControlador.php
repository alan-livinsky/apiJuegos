<?php

    class SuscripcionControlador{

        public function retonarListaSuscripciones($request, $response, $arg){
            $listaSuscripcion = Suscripcion::buscarTodas();
            $json = json_encode($listaSuscripcion);
            $response->getBody()->write($json);
            return $response;
        }

        public function retornarEliminarSuscripcion($request, $response, $arg){
            $json = $request->getBody();
            $datosSuscripcion = json_decode($json);
            $email = $datosSuscripcion -> email;
            $objetoSuscripcion = new Suscripcion();
            $suscripcionActual = $objetoSuscripcion->eliminarSuscripcion($email);
            $json = json_encode($suscripcionActual);
            $response->getBody()->write($json);
            return $response;
        }

        public function retornarActualizarSuscripcion($request, $response, $arg){
            $json = $request->getBody();
            $datosSuscripcion = json_decode($json);
            $email = $datosSuscripcion -> email;
            $tipo_subscripcion = $datosSuscripcion -> tipo;
            $objetoSuscripcion = new Suscripcion();
            $suscripcionActual = $objetoSuscripcion->actualizarSuscripcion($email,$tipo_subscripcion);
            $json = json_encode($suscripcionActual);
            $response->getBody()->write($json);
            return $response;
        }

        public function retornarEstadoCreada($request, $response, $arg){
            $json = $request->getBody();
            $datosSuscripcion = json_decode($json);
            $objetoSuscripcion = new Suscripcion();
            $suscripcionActual = $objetoSuscripcion->crearSuscripcion($datosSuscripcion);
            $json = json_encode($suscripcionActual);
            $response->getBody()->write($json);
            return $response;
        }

        public function retonarSuscripcionUsuario($request, $response, $arg){
            $json = $request->getBody();
            $datosSuscripcion = json_decode($json);
            $email = $datosSuscripcion -> email;
            $objetoSuscripcion = new Suscripcion();
            $suscripcionActual = $objetoSuscripcion->buscarSuscripcionUsuario($email);
            $json = json_encode($suscripcionActual);
            $response->getBody()->write($json);
            return $response;
        }

    }
?>
