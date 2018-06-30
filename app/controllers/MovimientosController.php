<?php 
require_once "../app/models/EmpleadosModel.php";
require_once "../app/models/MovimientoDetalleModel.php";
require_once "../app/models/MovimientoBienModel.php";
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
}