<?php

require_once "ConexionModel.php";

class UsuariosModel{

  public function consulta(){
    $conexion = ConexionModel::conexion();

    $query = "SELECT * FROM usuarios";

    $resultado = mysqli_query($conexion, $query);

    return $resultado;
  }

  public function login($datos){
    return "los datos enviados son: username ".$datos["usuario"]." contraseña ".$datos["pass"];
  }
}
