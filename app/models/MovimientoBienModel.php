<?php

require_once "ConexionModel.php";

class MovimientoBienModel
{

	public function consultaBienHistorico($datos)
	{
		$conexion = ConexionModel::conexion();

	    $numero_bien = pg_escape_string($datos['numero_bien']);

	    $query = "SELECT movimiento_bienes.numero_bien,
						movimientos_detalle.id_movimiento,
						tipo_movimiento.nombre_mov,
 						movimientos_detalle.id_cedula_empleado, 
 						empleados.nombre_empleado,
 						empleados.apellido_empleado,
 						cargos.descripcion_cargo,
 						gerencias.descripcion_gerencia,
 						institucion.nombre_institucion,
 						movimientos_detalle.fecha_mov,
						bienes.descripcion_bien,
						tipo_bien.descripcion_tipobien,
						inventario.caracteristicas,
						inventario.serial_bien
 				FROM movimientos_detalle
 				INNER JOIN movimiento_bienes on movimiento_bienes.id_movimiento = movimientos_detalle.id_movimiento
 				INNER JOIN empleados ON empleados.cedula = movimientos_detalle.id_cedula_empleado
 				INNER JOIN tipo_movimiento ON tipo_movimiento.id_tipo_mov = movimientos_detalle.tipo_movimiento
 				INNER JOIN cargos ON empleados.id_cargo = cargos.id_cargo
 				INNER JOIN gerencias ON gerencias.id_gerencia = empleados.id_gerencia
 				INNER JOIN institucion ON institucion.id_institucion = empleados.id_institucion
 				INNER JOIN inventario ON inventario.numero_bien = movimiento_bienes.numero_bien
 				INNER JOIN bienes ON inventario.id_bien = bienes.id_bienes
 				INNER JOIN tipo_bien ON bienes.id_tipo_bien = tipo_bien.id_tipo_bien
 				where movimiento_bienes.numero_bien =  '$numero_bien';";

	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}

		public function consultaBien($datos)
	{
		$conexion = ConexionModel::conexion();

	    $numero_bien = pg_escape_string($datos['numero_bien']);

	    $query = "SELECT movimiento_bienes.numero_bien,
						 tipo_bien.descripcion_tipobien, 
						 bienes.descripcion_bien,
						 inventario.caracteristicas,
						 inventario.serial_bien,
						 tipo_movimiento.nombre_mov,
						 movimientos_detalle.id_cedula_empleado, 
					     empleados.nombre_empleado,
					     empleados.apellido_empleado,
					     cargos.descripcion_cargo,
					     gerencias.descripcion_gerencia,
					 	institucion.nombre_institucion,
					 	movimientos_detalle.fecha_mov	
						FROM movimientos_detalle
					 	INNER JOIN movimiento_bienes on movimiento_bienes.id_movimiento = movimientos_detalle.id_movimiento
					 	INNER JOIN empleados ON empleados.cedula = movimientos_detalle.id_cedula_empleado
					 	INNER JOIN tipo_movimiento ON tipo_movimiento.id_tipo_mov = movimientos_detalle.tipo_movimiento
					 	INNER JOIN cargos ON empleados.id_cargo = cargos.id_cargo
					 	INNER JOIN gerencias ON gerencias.id_gerencia = empleados.id_gerencia
					 	INNER JOIN institucion ON institucion.id_institucion = empleados.id_institucion
					 	INNER JOIN inventario ON inventario.numero_bien = movimiento_bienes.numero_bien
					 	INNER JOIN bienes ON inventario.id_bien = bienes.id_bienes
					 	INNER JOIN tipo_bien ON bienes.id_tipo_bien = tipo_bien.id_tipo_bien
					 	where movimiento_bienes.numero_bien =  '$numero_bien' 
					 	ORDER BY movimientos_detalle.id_movimiento DESC LIMIT 1;";

	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}

}