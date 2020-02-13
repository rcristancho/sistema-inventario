<?php

require_once "ConexionModel.php";

class InstitucionModel{

	public function select (){

	$conexion = ConexionModel::conexion();

	$query = "SELECT id_institucion, nombre_institucion FROM institucion";

	$resultado = pg_query($conexion, $query);

	return $resultado;

	}

}