<?php

class Paginas{

  /*
   *
   */
  public function enlacesPaginaModel($enlaces)
  {
    
    if (!isset($_SESSION["logueado"])) {
      //Validamos si el usuario esta logueado o no dentro del sistema
      $module = "../app/views/modules/login.php";

    }elseif ($enlaces == "admin/usuarios_create" ||
             $enlaces == "admin/usuarios_consulta" ||
             $enlaces == "admin/tipo_bien" ||
             $enlaces == "admin/crear_tipobien" ||
             $enlaces == "bienes/incorporacion" ||
             $enlaces == "bienes/asignacion" ||
             $enlaces == "bienes/desvinculacion" ||
             $enlaces == "reportes/consulta_cedula" ||
             $enlaces == "reportes/consulta_bien" ||
             $enlaces == "reportes/consulta_historico_bien" ||
             $enlaces == "reportes/consulta_tipo_bien" ||
             $enlaces == "reportes/consulta_inventario" || 
             $enlaces == "usuarios/perfil" ||
             $enlaces == "empleados/empleados" ||
             $enlaces == "prueba") {
      //Llamamos a los modulos correspondientes a la ruta GET
      $module = "../app/views/modules/".$enlaces.".php";

    }elseif ($enlaces == "index"){
      //Llamamos a index de la aplicacion
      $module = "../app/views/modules/inicio.php";

    }elseif ($enlaces == "logout") {
      //Si la ruta es logout se destruye la sesion y se envia al index.php
      session_destroy();
      header('Location: index.php');
    }else{
      //Llamamos a index de la aplicacion
      $module = "../app/views/modules/inicio.php";
    }

    return $module;
  }
  
}
