<?php

include_once('AccesoDatos.php');

function ejecutarConsulta($consulta,$clase){
    $accesoDatos=AccesoDatos::obtenerObjetoAcceso(); 
    $consulta=$accesoDatos->prepararConsulta($consulta);
    $consulta->execute();
    $resultadoConsulta=$consulta->fetchAll(PDO::FETCH_CLASS,$clase);
    return $resultadoConsulta;
}

function obtenerUltimaID($tabla,$campo){
    $accesoDatos=AccesoDatos::obtenerObjetoAcceso();
    $sql = "SELECT MAX($campo) FROM $tabla";
    $consulta=$accesoDatos->prepararConsulta($sql);
    $consulta->execute();
    $resultadoConsulta=$consulta->fetchColumn();
    return $resultadoConsulta;
}

?>