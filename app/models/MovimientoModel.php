<?php

require_once "ConexionModel.php";

class MovimientoModel 
{

	public function registroMovDetalle($datos)
	{
	    $conexion = ConexionModel::conexion();
	    $cedula = $datos['cedula'];
	    $observacion = $datos['observacion'];
	    $fecha = date("Y-m-d");

	    $cedula_usuario = $_SESSION["user_id"];

	    $query= "INSERT INTO public.movimientos_detalle (id_cedula_empleado, observacion_bien, fecha_mov, tipo_movimiento, id_estatus, cedula_usuario) 
				VALUES ('$cedula', '$observacion', '$fecha', '1', '2', '$cedula_usuario') RETURNING id_movimiento";

		$resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function registroMovBien ($bien, $id_movimiento)
	{
		$conexion = ConexionModel::conexion();

		$query = sprintf("INSERT INTO movimiento_bienes (id_movimiento, numero_bien, estatus_uso)
						  VALUES ('%s', '%s', '%s')",
						  $id_movimiento,
						  $bien,
						  true);

		$resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function registroMovimientoBienDesvinculacion ($bien, $id_movimiento)
	{
		$conexion = ConexionModel::conexion();

		$query = sprintf("INSERT INTO movimiento_bienes (id_movimiento, numero_bien, estatus_uso)
						  VALUES ('%s', '%s', null)",
						  $id_movimiento,
						  $bien);

		$resultado = pg_query($conexion, $query);

	    return $resultado;
	}
}