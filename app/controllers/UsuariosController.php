<?php

require_once "../app/models/UsuariosModel.php";

class UsuariosController{

  public function consulta(){
    $respuesta = UsuariosModel::consulta();
    return $respuesta;
  }

  public function ingreso(){
    if (isset($_POST["submit_login"])) {
        $datos = array(
          $user => $_POST["name"],
          $pass => $_POST["psw"],
        );

        $respuesta = UsuariosModel::login($datos);
        return $respuesta;
    }
  }
}
