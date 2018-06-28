<?php

require_once "ConexionModel.php";

class UbicacionAlmacenModel{

	public function select (){

	$conexion = ConexionModel::conexion();

	$query = "SELECT id_ubicacion_almacen, nombre_almacen FROM ubicacion_almacen";

	$resultado = pg_query($conexion, $query);

	return $resultado;

	}
}