<?php

require_once "../app/models/MovimientoModel.php";
require_once "../app/models/InventarioModel.php";

class MovimientoController
{
	public function asignarBienes ()
	{
		if (isset($_POST["submit_asignacion"])) {
		
			$datos = array(
				'cedula' 	  => pg_escape_string($_POST["cedula_empleado_hidden"]),
				'bienes' 	  => $_POST["numero_bien"],
				'observacion' => pg_escape_string($_POST["observacion"]),
			);

			$movimiento = MovimientoModel::registroMovDetalle($datos);

			$fila_movimiento = pg_fetch_assoc($movimiento);
			//var_dump(pg_num_rows($id_movimiento));

			if (pg_num_rows($movimiento) == 0) {
				echo '<script type="text/javascript">alert("Ocurrio un error al guardar. Comunicarse con el Administrador!");</script>';
			}else{

				foreach ($datos["bienes"] as $bien) {
					//echo "El numero del bien: ".$bien." el numero del movimiento :".$fila_movimiento["id_movimiento"]."<br>";
					
					$resultado = MovimientoModel::registroMovBien($bien, $fila_movimiento["id_movimiento"]);
					
					//var_dump(pg_affected_rows($resultado));
					
					if (pg_affected_rows($resultado) == 0) {
						echo '<script type="text/javascript">alert("Ocurrio un Error al Asignar el Bien"!");</script>';
						//echo "ocurrio un error al guardar en movimiento bienes";
						break;
					}else{
						$actualizacion = InventarioModel::actualizarEstatus($bien);

						if (pg_affected_rows($actualizacion) == 0) {
							//echo "error al actualizar";
							echo '<script type="text/javascript">alert("No pudo Acturalizar el estatus del bien");</script>';
							break;
						}else{
							echo '<script type="text/javascript">alert("Se asigno exitosamente el bien Nro. '.$bien.'!");</script>';
						}
					}
				}

				//header("Location: http::/127.0.0.1/sib/public/");
			}

		}
		
     

		//var_dump($datos);
	}
}

