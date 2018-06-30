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

	    $query= "INSERT INTO public.movimientos_detalle (id_cedula_empleado, observacion_bien, fecha_mov, tipo_movimiento, id_estatus) 
				VALUES ('$cedula', '$observacion', '$fecha', '1', '2') RETURNING id_movimiento";

		$resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function registroMovBien ($bien, $id_movimiento)
	{
		$conexion = ConexionModel::conexion();

		$query = sprintf("INSERT INTO movimiento_bienes (id_movimiento, numero_bien)
						  VALUES ('%s', '%s')",
						  $id_movimiento,
						  $bien);

		$resultado = pg_query($conexion, $query);

	    return $resultado;
	}

}