<?php

require_once "ConexionModel.php";

class EmpleadosModel{

	public function consultaCedula($datos){
	    $conexion = ConexionModel::conexion();

	    $cedula = pg_escape_string($datos['cedula']);

	    $query = "SELECT a.*,b.descripcion_gerencia,c.descripcion_cargo,d.nombre_institucion FROM empleados a 
	    		  INNER JOIN gerencias b ON b.id_gerencia = a.id_gerencia
	    		  INNER JOIN cargos c ON c.id_cargo = a.id_cargo
	    		  INNER JOIN institucion d ON d.id_institucion = a.id_institucion 
	    		  WHERE cedula = $cedula";




	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}
}