<?php

require_once "ConexionModel.php";

class UsuariosModel{

  /*
   *
   */
  public function select()
  {
    $conexion = ConexionModel::conexion();

    $query = "SELECT * FROM usuarios";

    $resultado = mysqli_query($conexion, $query);

    return $resultado;
  }

  /*
   *
   */
  public function loginUsuario($datos)
  {
    $conexion = ConexionModel::conexion();

    $query = sprintf("SELECT * FROM usuarios WHERE cedula = '%s' AND password = '%s'",
                     $datos['cedula'],
                     $datos['password']);

    $resultado = pg_query($conexion, $query);

    return $resultado;
  }

  /*
   *
   */
  public function consultaCedula ($cedula)
  {
  	$conexion = ConexionModel::conexion();

  	$query = "SELECT * FROM usuarios WHERE cedula = $cedula";

  	$resultado = pg_query($conexion, $query);

  	return $resultado;
  }

  /*
   *
   */
  public function registroUsuario ($datos) 
  {
  	$conexion = ConexionModel::conexion();

  	$query = sprintf("INSERT INTO usuarios(cedula, nombre, apellido, correo, password, id_perfil, estatus_usuario) 
  			  VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s')",
    		  $datos["cedula"], 
    		  $datos["nombre"], 
    		  $datos["apellido"], 
    		  $datos["email"], 
    		  $datos["password"], 
    		  $datos["perfil"], 
    		  true);

  	$resultado = pg_query($conexion, $query);

  	return $resultado;
  }

  /*
   *
   */
  public function usuariosActivos($datos)
  {
    $conexion = ConexionModel::conexion();

    $query = sprintf("SELECT * FROM usuarios WHERE cedula = '%s' AND estatus_usuario = '%s'",
                     $datos["cedula"],
                     true);

    $resultado = pg_query($conexion, $query);

    return $resultado;
  }
}
