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

	public function ConsultarBien($bien)
	{
	    $conexion = ConexionModel::conexion();
		$bien = pg_escape_string($bien['numero_bien']);

		$sql = "SELECT inventario.numero_bien, inventario.id_estatus, tipo_bien.descripcion_tipobien,bienes.descripcion_bien,
				inventario.grupo,inventario.sub_grupo,inventario.seccion,institucion.nombre_institucion,
				inventario.caracteristicas,inventario.serial_bien,inventario.valor,ubicacion_almacen.nombre_almacen
					FROM inventario
					 JOIN bienes ON bienes.id_bienes = inventario.id_bien
					 JOIN tipo_bien ON tipo_bien.id_tipo_bien = bienes.id_tipo_bien
					 JOIN institucion ON institucion.id_institucion = inventario.id_institucion
					 JOIN ubicacion_almacen ON ubicacion_almacen.id_ubicacion_almacen = inventario.id_ubicacion_almacen
					WHERE numero_bien = $bien";

		$query = pg_query($conexion, $sql);

		return $query; 

	}

}