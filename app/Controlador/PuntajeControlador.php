<?php

class PuntajeControlador{
    public function retonarListaPuntajes($request, $response, $arg)
    {
        $listaPuntaje = Puntaje::buscarTodos();
        $json = json_encode($listaPuntaje);
        $response->getBody()->write($json);
        return $response;
    }

    public function retornarActualizacionPuntaje($request, $response, $arg){
        $json = $request->getBody();
        $datosPuntajeUsuario = json_decode($json);
        $objetoPuntaje = new Puntaje();
        $puntajeActual = $objetoPuntaje->actualizarPuntaje($datosPuntajeUsuario,$_SESSION['usuario']);
        $json = json_encode($puntajeActual);
        $response->getBody()->write($json);
        return $response;
    }

    public function retornarEstadoCreado($request, $response, $arg){
        $json = $request->getBody();
        $datosPuntaje = json_decode($json);
        $objetoPuntaje = new Puntaje();
        $puntajeActual = $objetoPuntaje->crearPuntaje($datosPuntaje);
        $json = json_encode($puntajeActual);
        $response->getBody()->write($json);
        return $response;
    }

    public function retonarPuntajesUsuario($request, $response, $arg){
        $json = $request->getBody();
        $datos = json_decode($json);
        $email = $datos -> email;
        $objetoPuntaje = new Puntaje();
        $puntajeActual = $objetoPuntaje->buscarPuntajeUsuario($email);
        $json = json_encode($puntajeActual);
        $response->getBody()->write($json);
        return $response;
    }
}

?>