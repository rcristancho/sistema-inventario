<?php
class ConexionModel{

  public function conexion(){

    $host     = "localhost";
    $database = "HCDATABASE02";
    $user     = "root";
    $password = "";

    $mysqli = mysqli_connect($host, $user, $password, $database);

    if (mysqli_connect_errno($mysqli)) {
      return "Fallo al conectar a MySQL: " . mysqli_connect_error();
    }else{
      return $mysqli;
    }
  }

}
