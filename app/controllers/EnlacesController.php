<?php

class EnlacesController{

  //Llamada a la Plantilla
  public function pagina(){
    include "../app/views/template.php";
  }

  //Enlaces a Paginas de la Aplicacion
  public function enlacesPaginaController(){
    if (isset($_GET["action"])) {
      $enlaces = $_GET["action"];
    }else{
      $enlaces = "index";
    }

    $respuesta = Paginas::enlacesPaginaModel($enlaces);
    include $respuesta;
  }
}
