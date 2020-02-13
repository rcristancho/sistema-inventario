<?php 
require_once "../app/models/EmpleadosModel.php";
require_once "../app/models/MovimientoDetalleModel.php";
require_once "../app/models/MovimientoBienModel.php";
require_once "../app/models/MovimientoModel.php";
require_once "../app/models/InventarioModel.php";

class MovimientosController{
		
	public function consultaEmpleado()
	{
		if(isset($_POST["submit_consulta"]))
		{
			//Pasamos los datos al array
			$datos = array(
			'cedula' => $_POST['cedula'],
			);
	      	//Llamamos a la Clase y al Metodo
	       	$respuesta = EmpleadosModel::consultaCedula($datos);	 
			if(pg_num_rows($respuesta) > 0)
			{
				$data = MovimientoDetalleModel::consultarBienesEmpleados($datos);

				if (pg_num_rows($data) > 0)
				{
				 	return $data;
				}
				else
				{
					echo "<script>
							alert('El usuario no Tiene Bienes Asignados');							 
						 </script>";
				}
			}
			else
			{
				echo "<script>
							alert('Usuario no Existe');							 
					 </script>";
			}
		}	
		
	}

	public function consultaHistoricoBien()
	{
		if (isset($_POST["submit_consulta_bien"]))
		{
			$datos = array(
			'numero_bien' => $_POST['numero_bien'],
			);

			$respuesta = InventarioModel::consultarBien($datos);

			if (pg_num_rows($respuesta)>0)
			{
				$data = MovimientoBienModel::consultaBienHistorico($datos);

				if (pg_num_rows($data)>0)
				{
					return $data;
				}
				else
				{
					echo "<script>alert('El bien nunca se ha asignado')</script>";
				}
				//echo "<script>alert('Bien Consultado correctamente')</script>";
			}
			else
			{
				echo "<script>alert('bien no se encuentra')</script>";
			}
		}

	}

	public function consultaBien()
	{
		if (isset($_POST["submit_consulta_bien"]))
		{
			$datos = array(
			'numero_bien' => $_POST['numero_bien'],
			);

			$respuesta = InventarioModel::consultarBien($datos);

			if (pg_num_rows($respuesta)>0)
			{
				$data = MovimientoBienModel::consultaBien($datos);

				if (pg_num_rows($data)>0)
				{
					return $data;
				}
				else
				{
					echo "<script>alert('El bien no se ha asignado a ningun Usuario')</script>";
				}
				//echo "<script>alert('Bien Consultado correctamente')</script>";
			}
			else
			{
				echo "<script>alert('bien no se encuentra Registrado')</script>";
			}
		}

	}

	public function desvinculacionBienesEmpleado()
	{

		if(isset($_POST["submit_consulta"])){
			//Pasamos los datos al array
			$datos = array(
			'cedula' => pg_escape_string($_POST['cedula']),
			);
	      	//Llamamos a la Clase y al Metodo
	       	$respuesta = EmpleadosModel::consultaCedula($datos);	 
			if(pg_num_rows($respuesta) > 0){

				$data = MovimientoDetalleModel::consultarBienesActivosEmpleados($datos);

				if (pg_num_rows($data) > 0){
				 	return $data;
				}else{
					echo "<script>
							alert('El Empleado no posee Bienes asignados!');							 
						 </script>";
				}
			}else{
				echo "<script>
							alert('El Empleado no Existe!');							 
					 </script>";
			}
		}elseif (isset($_POST["submit_desvinculacion"])) {

			$datos = array(
				'numero_bien' => $_POST["desvincular"],
				'cedula' 	  => $_POST["cedula_empleado"],
			);

			$resultado = MovimientoDetalleModel::insertDesvinculacion($datos);

			$movimiento = pg_fetch_assoc($resultado);

			//var_dump($movimiento);

			if ($resultado) {
				//Actualizar el Estatus de los Bienes en Uso
				foreach ($datos["numero_bien"] as $bien) {
					$resultado = MovimientoBienModel::actualizacionEstatusUso($bien, $datos["cedula"]);

					if (!$resultado) {
						echo '<script type="text/javascript">alert("Ocurrio un error al guardar. Comunicarse con el Administrador!");</script>';
						break;
					};

					$resultado = MovimientoModel::registroMovimientoBienDesvinculacion($bien, $movimiento["id_movimiento"]);	

					if (!$resultado) {
						echo '<script type="text/javascript">alert("Ocurrio un error al guardar. Comunicarse con el Administrador!");</script>';
						break;
					};		

					$resultado = InventarioModel::actualizarEstatusDesvinculacion($bien);

					if (!$resultado) {
						echo '<script type="text/javascript">alert("Ocurrio un error al guardar. Comunicarse con el Administrador!");</script>';
						break;
					};
				}

				echo '<script type="text/javascript">alert("Se han desvinculado los Bienes exitosamente!");</script>';
			}else{
				echo '<script type="text/javascript">alert("Ocurrio un error al guardar. Comunicarse con el Administrador!");</script>';
			}

		}	
		
	}
}