<?php
class ConexionModel{

  public function conexion(){

    $host     = "localhost";
    $database = "Inventariobienes";
    $user     = "postgres";
    $password = "postgres";

    $dbconn = pg_connect("host=$host dbname=$database user=$user password=$password") 
    		  or die("<script>
                        alert('No se ha podido conectar a la Base de Datos. Error: ".pg_last_error()."')                        
                     </script>");

    return $dbconn;
  }

}

/*
//Funcion de prueba para validar la conexion a la base de datos.
$prueba = new ConexionModel();
var_dump($prueba->conexion());
*/