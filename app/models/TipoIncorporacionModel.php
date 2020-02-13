<?php

require_once "ConexionModel.php";

class TipoIncorporacionModel{

	public function select (){

	$conexion = ConexionModel::conexion();

	$query = "SELECT id_tipo_incorporacion, descripcion_incorporacion FROM tipo_incorporacion;";

	$resultado = pg_query($conexion, $query);

	return $resultado;

	}

}