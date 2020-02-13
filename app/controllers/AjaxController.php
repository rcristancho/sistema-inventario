<?php
require_once "../../app/models/EmpleadosModel.php";
require_once "../../app/models/InventarioModel.php";
require_once "../../app/models/TipoBienModel.php";
require_once "../../app/models/UsuariosModel.php";

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

		if (isset($_GET["tipo_bien"])) {
			$tipo_bien = pg_escape_string($_GET["tipo_bien"]);
			$valor = TipoBienModel::consultaId($tipo_bien);
			if (pg_num_rows($valor) > 0) {
				return pg_fetch_assoc($valor);
			}
		}

		if (isset($_GET["suspender"])) {

			$id = pg_escape_string($_GET["suspender"]);

			$resultado = UsuariosModel::suspender($id);

			if (pg_result_status($resultado)) {
				return "Usuario suspendido Exitosamente";
			}else{
				return "Ha ocurrido un error. Comunicarse con el Administrador.";
			}
		}

		if (isset($_GET["activar"])) {

			$id = pg_escape_string($_GET["activar"]);

			$resultado = UsuariosModel::activar($id);

			if (pg_result_status($resultado)) {
				return "Usuario activado Exitosamente";
			}else{
				return "Ha ocurrido un error. Comunicarse con el Administrador.";
			}
		}
	}

}

header('Content-Type: application/json'); 
$respuesta = AjaxController::consultas();
//return json_encode($var);
echo json_encode($respuesta);