<?php

require_once "../app/models/TipoBienModel.php";
require_once "../app/models/BienesModel.php";
require_once "../app/models/InstitucionModel.php";
require_once "../app/models/TipoIncorporacionModel.php";
require_once "../app/models/UbicacionAlmacenModel.php";
require_once "../app/models/PerfilesModel.php";
require_once "../app/models/CargoModel.php";
require_once "../app/models/GerenciaModel.php";

class SelectController {

	public function selectTipoBien(){

		$respuesta = TipoBienModel::select();

		return $respuesta;

	}

	public function selectBienes(){

		$respuesta = BienesModel::select();	
		
		return $respuesta;	
	}

	public function selectInstitucion(){

		$respuesta = InstitucionModel::select();	
		
		return $respuesta;	
	}

	public function selectTipoIncorporacion(){

		$respuesta = TipoIncorporacionModel::select();	
		
		return $respuesta;	
	}

	public function selectUbicacionAlmacen(){

		$respuesta = UbicacionAlmacenModel::select();	
		
		return $respuesta;	
	}

	public function selectPErfil(){

		$respuesta = PerfilesModel::select();

		return $respuesta;

	}

	public function selectCargos()
	{
		$respuesta = CargoModel::select();

		return $respuesta;
	}

	public function selectGerencia()
	{
		$respuesta = GerenciaModel::select();

		return $respuesta;
	}
}
