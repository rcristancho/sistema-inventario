<?php

class Paginas{

  /*
   *
   */
  public function enlacesPaginaModel($enlaces)
  {
    if (!isset($_SESSION["logueado"])) {
      $module = "../app/views/modules/login.php";
    }elseif ($enlaces == "admin/usuarios_create" ||
             $enlaces == "bienes/incorporacion" ||
             $enlaces == "bienes/asignacion") {
      //Llamamos a los modulos correspondientes a la ruta GET
      $module = "../app/views/modules/".$enlaces.".php";
    }elseif ($enlaces == "index"){
      //Llamamos a index de la aplicacion
      $module = "../app/views/modules/inicio.php";
    }elseif ($enlaces == "logout") {
      session_destroy();
      header('Location: index.php');
    }else{
      //Llamamos a index si la variable GET tiene un valor no definido
      $module = "../app/views/modules/inicio.php";
    }

    return $module;
  }
  
}
