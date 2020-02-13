<?php

require_once "ConexionModel.php";

class GerenciaModel{

	public function select () {

	$conexion = ConexionModel::conexion();

	$query = "SELECT * FROM gerencias";

	$resultado = pg_query($conexion, $query);

	return $resultado;

	}

}