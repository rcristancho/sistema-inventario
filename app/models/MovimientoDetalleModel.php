<?php

require_once "ConexionModel.php";

class MovimientoDetalleModel
{

	public function consultarBienesEmpleados($datos)
	{
	    $conexion = ConexionModel::conexion();

	    $cedula = pg_escape_string($datos['cedula']);

	    $query = "SELECT  
	    		movimientos_detalle.id_cedula_empleado,empleados.nombre_empleado,empleados.apellido_empleado,
				tipo_bien.descripcion_tipobien,bienes.descripcion_bien,movimiento_bienes.numero_bien,inventario.serial_bien,inventario.grupo,inventario.sub_grupo,inventario.seccion,inventario.caracteristicas,movimientos_detalle.fecha_mov
				FROM movimientos_detalle
					JOIN movimiento_bienes ON movimiento_bienes.id_movimiento = movimientos_detalle.id_movimiento
					JOIN inventario ON inventario.numero_bien = movimiento_bienes.numero_bien
					JOIN bienes ON bienes.id_bienes = inventario.id_bien
					JOIN tipo_bien ON tipo_bien.id_tipo_bien = bienes.id_tipo_bien
					JOIN empleados ON empleados.cedula = movimientos_detalle.id_cedula_empleado
					WHERE id_cedula_empleado = '$cedula';";

	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}
}