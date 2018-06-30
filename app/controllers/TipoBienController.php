<?php

require_once "../app/models/TipoBienModel.php";

class TipoBienController
{

    public function consultaTipoBien()
    {
        if (isset($_POST["tipo_bien"]))
        {

            //Pasamos los datos al array
            $datos = array(
                'tipo_bien' => $_POST['tipo_bien'],
            );

            //Llamamos a la Clase y al Metodo
            $respuesta = TipoBienModel::consultarTipoBien($datos);

            if (pg_num_rows($respuesta) > 0)
            {
                return $respuesta; 
            }else
            {
                return null;
            }
        }
    }

}
