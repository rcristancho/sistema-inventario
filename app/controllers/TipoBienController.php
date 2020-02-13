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

    public function consulta()
    {
        return TipoBienModel::consulta();
    }

    public function actualizacion()
    {
        if ($_POST["submit"] == 'edit') {
            $datos = array(
                'id'          => pg_escape_string($_POST["id"]),
                'descripcion' => pg_escape_string($_POST["descripcion"]),
            );

            $respuesta = TipoBienModel::actualizacion($datos);

            if (pg_result_status($respuesta)) {
                echo "<script>
                            alert('Actualizado correctamente!');                           
                         </script>"; 
                header("Location: index.php?action=bienes/desvinculacion");  
            }else{
                echo "<script>
                            alert('Ha ocurrido un error. Comunicarse con el Administrador!');                           
                         </script><meta http-equiv='refresh' content='0'>";
            }
        }
    }
}
