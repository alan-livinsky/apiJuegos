<?php

class GameControlador
{

  
  public function retonarListaGames($request, $response, $arg)
  {
    $listaGames = Game::buscarTodos();
    $json = json_encode($listaGames);
    $response->getBody()->write($json);
    return $response;
  }

  public function retornarEstadoCreado($request, $response, $arg)
  {
    $json = $request->getBody();
    $datosGames = json_decode($json);
    $objetoGames = new Game();
    $GamesActual = $objetoGames->crearGame($datosGames);
    $json = json_encode($GamesActual);
    $response->getBody()->write($json);
    return $response;
    
    
    
    
    
  }
}
