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
}