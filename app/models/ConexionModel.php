<?php
class ConexionModel{

  public function conexion(){

    $host     = "localhost";
    $database = "inventario_bienes";
    $user     = "postgres";
    $password = "postgres";

    $dbconn = pg_connect("host=$host dbname=$database user=$user password=$password") or die("No se ha podido conectar: ".pg_last_error());

    return $dbconn;
  }

}

/*
//Funcion de prueba para validar la conexion a la base de datos.
$prueba = new ConexionModel();
var_dump($prueba->conexion());
*/