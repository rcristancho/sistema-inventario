<?php

require_once "ConexionModel.php";

class InventarioModel{

	public function insertarBien($datosBien)
	{
	    $conexion = ConexionModel::conexion();

	    $query = sprintf("INSERT INTO public.inventario(
			            id_bien, grupo, sub_grupo, seccion, fecha_registro, 
			            id_institucion, numero_bien, caracteristicas, serial_bien, id_tipo_incorporacion, 
			            fecha_adquisicion, procedencia, valor, id_ubicacion_almacen, 
			            observacion, id_estatus, id_gerencia_responsable)
			    		VALUES ('%s', '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
			    		$datosBien['bienes'],
			    		$datosBien['grupo'],
			    		$datosBien['sub_grupo'],
			    		$datosBien['seccion'],
			    		$datosBien['date'],
			    		$datosBien['institucion'],
			    		$datosBien['numero_bien'],
			    		$datosBien['caracteristicas_bien'],
			    		$datosBien['serial_bien'],
			    		$datosBien['tipo_incorporacion'],
			    		$datosBien['fecha_adquisicion'],
			    		$datosBien['procedencia_bien'],
			    		$datosBien['valor_bien'],
			    		$datosBien['ubicacion_almacen'],
			    		$datosBien['observacion'],
			    		$datosBien['estatus'],
	    				$datosBien['gerencia_responsable']);

	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function consultarBien($datos)
	{
		$conexion = ConexionModel::conexion();

		$numero_bien = pg_escape_string($datos['numero_bien']);
		$query = "SELECT * FROM inventario WHERE numero_bien = '$numero_bien';";

		$resultado = pg_query($conexion, $query);

		return $resultado;
	}

	public function consultaId($id)
	{
	    $conexion = ConexionModel::conexion();    				
		
		$query = "SELECT inventario.numero_bien,inventario.id_estatus,tipo_bien.descripcion_tipobien,bienes.descripcion_bien,
				  inventario.grupo,inventario.sub_grupo,inventario.seccion,institucion.nombre_institucion,
				  inventario.caracteristicas,inventario.serial_bien,inventario.valor,ubicacion_almacen.nombre_almacen
				  FROM inventario
				  INNER JOIN bienes ON bienes.id_bienes = inventario.id_bien
				  INNER JOIN tipo_bien ON tipo_bien.id_tipo_bien = bienes.id_tipo_bien
				  INNER JOIN institucion ON institucion.id_institucion = inventario.id_institucion
				  INNER JOIN ubicacion_almacen ON ubicacion_almacen.id_ubicacion_almacen = inventario.id_ubicacion_almacen
				  WHERE inventario.numero_bien = $id AND inventario.id_estatus = 1";

	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}

	public function actualizarEstatus($bien)
	{
	    $conexion = ConexionModel::conexion();    				
		
		$query = "UPDATE public.inventario SET id_estatus = '2' WHERE numero_bien = '$bien'";

	    $resultado = pg_query($conexion, $query);

	    return $resultado;
	}
}