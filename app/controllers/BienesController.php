<?php

require_once "../app/models/BienesModel.php";
require_once "../app/models/EmpleadosModel.php";

class BienesController{

  public function consultaCedula(){
    if (isset($_POST["submit_consulta"])) {

    	//Pasamos los datos al array
    	$datos = array(
    		'cedula' => $_POST['cedula'],
    	);

    	//Llamamos a la Clase y al Metodo
    	$respuesta = EmpleadosModel::consultaCedula($datos);

    	if (pg_num_rows($respuesta) > 0) {
    		return pg_fetch_assoc($respuesta); 
    	}else{
    		return null;
    	}
    }
  }

}
