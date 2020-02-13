<?php

require_once "ConexionModel.php";

class TipoBienModel
{

	public function select ()
	{

	$conexion = ConexionModel::conexion();

	$query = "SELECT id_tipo_bien, descripcion_tipobien FROM tipo_bien";

	$resultado = pg_query($conexion, $query);

	return $resultado;

	}

	public function consultarTipoBien($datos)
	{
		$conexion = ConexionModel::conexion();

		$tipo_bien = pg_escape_string($datos['tipo_bien']);

		$query = "SELECT inventario.numero_bien,
						bienes.descripcion_bien,
						inventario.serial_bien,
						inventario.grupo,
						inventario.sub_grupo,
						inventario.seccion,
						inventario.caracteristicas,
						estatus.descripcion_estatus
					FROM inventario
					JOIN bienes ON bienes.id_bienes = inventario.id_bien
					JOIN tipo_bien ON tipo_bien.id_tipo_bien = bienes.id_tipo_bien
					JOIN estatus ON estatus.id_estatus = inventario.id_estatus
					WHERE bienes.id_tipo_bien = '$tipo_bien';";

			$resultado = pg_query($conexion, $query);

			return $resultado;
	}

	public function consulta()
	{
		$conexion = ConexionModel::conexion();

		$query = "SELECT * FROM tipo_bien";

		$resultado = pg_query($conexion, $query);

		return $resultado;
	}

	public function consultaId($id)
	{
		$conexion = ConexionModel::conexion();

		$query = "SELECT * FROM tipo_bien WHERE id_tipo_bien = $id";

		$resultado = pg_query($conexion, $query);

		return $resultado;
	}

	public function actualizacion($datos)
	{
		$conexion = ConexionModel::conexion();

		$query = sprintf("UPDATE public.tipo_bien
						  SET descripcion_tipobien = '%s'
						  WHERE id_tipo_bien= '%s'",
						  $datos["descripcion"],
						  $datos["id"]);

		$resultado = pg_query($conexion, $query);

		return $resultado;
	}
}