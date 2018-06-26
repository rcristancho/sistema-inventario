<?php

require_once "ConexionModel.php";

class BienesModel{

	/*
	 *
	 */
	public function select ()
	{
		$conexion = ConexionModel::conexion();

		$query = "SELECT id_bienes, descripcion_bien FROM bienes;";

		$resultado = pg_query($conexion, $query);

		return $resultado;
	}

}