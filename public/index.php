<?php
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
error_reporting(E_ERROR | E_PARSE);

require_once "../app/models/EnlacesModel.php";
require_once "../app/controllers/EnlacesController.php";

$mvc = new EnlacesController();
$mvc->pagina();
