<?php

require_once "ConexionModel.php";

class CargoModel{

	public function select () {

	$conexion = ConexionModel::conexion();

	$query = "SELECT * FROM cargos";

	$resultado = pg_query($conexion, $query);

	return $resultado;

	}

}