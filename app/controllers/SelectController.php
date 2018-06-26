<?php

require_once "../app/models/TipoBienModel.php";
require_once "../app/models/BienesModel.php";
require_once "../app/models/PerfilesModel.php";

class SelectController {

	/*
	 *
	 */
	public function selectTipoBien()
	{

		$respuesta = TipoBienModel::select();

		return $respuesta;

	}

	/*
	 *
	 */
	public function selectBienes()
	{

		$respuesta = BienesModel::select();	
		
		return $respuesta;	
	}

	/*
	 *
	 */
	public function selectPerfil()
	{

		$respuesta = PerfilesModel::select();	
		
		return $respuesta;	
	}
}
