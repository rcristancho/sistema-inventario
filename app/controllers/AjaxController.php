<?php
require_once "../../app/models/EmpleadosModel.php";
require_once "../../app/models/InventarioModel.php";

class AjaxController
{
	/**
	 *
	 */
	public function consultas ()
	{
		if (isset($_GET["cedula"])) {
			$cedula = pg_escape_string($_GET["cedula"]);
			$valor = EmpleadosModel::consultaId($cedula);
			if (pg_num_rows($valor) > 0) {
				return pg_fetch_assoc($valor);
			}
		}

		if (isset($_GET["numero_bien"])) {
			$numero_bien = pg_escape_string($_GET["numero_bien"]);
			$valor = InventarioModel::consultaId($numero_bien);
			if (pg_num_rows($valor) > 0) {
				return pg_fetch_assoc($valor);
			}
		}
	}

}

header('Content-Type: application/json'); 
$respuesta = AjaxController::consultas();
//return json_encode($var);
echo json_encode($respuesta);