<?php

require_once "ConexionModel.php";

class TipoBienModel{

	public function select (){

	$conexion = ConexionModel::conexion();

	$query = "SELECT id_tipo_bien, descripcion_tipobien FROM tipo_bien";

	$resultado = pg_query($conexion, $query);

	return $resultado;

	}

}