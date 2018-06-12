<?php

class Paginas{

  public function enlacesPaginaModel($enlaces){
    if ($enlaces == "ingresar" ||
        $enlaces == "usuarios" ||
        $enlaces == "editar" ||
        $enlaces == "salir") {
      //Llamamos a los modulos correspondientes a la ruta GET
      $module = "../app/views/modules/".$enlaces.".php";
    }elseif ($enlaces == "index") {
      //Llamamos a index de la aplicacion
      $module = "../app/views/modules/inicio.php";
    }else{
      //Llamamos a index si la variable GET tiene un valor no definido
      $module = "../app/views/modules/inicio.php";
    }
    return $module;
  }
}
