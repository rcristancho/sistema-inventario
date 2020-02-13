<?php

require_once "../app/models/BienesModel.php";
require_once "../app/models/EmpleadosModel.php";
require_once "../app/models/InventarioModel.php";

class BienesController
{

    public function consultaCedula()
    {
        if (isset($_POST["submit_consulta"]))
        {

            //Pasamos los datos al array
            $datos = array(
                'cedula' => $_POST['cedula'],
            );

            //Llamamos a la Clase y al Metodo
            $respuesta = EmpleadosModel::consultaCedula($datos);

            if (pg_num_rows($respuesta) > 0)
            {
                return pg_fetch_assoc($respuesta); 
            }else
            {
                return null;
            }
        }
    }


    public function registrarBien()
    {
        if (isset($_POST["submit_consulta"]))
        {
            $date = date('Y-m-d');
            $datosBien = array(

                'tipo_bien'=> $_POST['tipo_bien'],
                'bienes' => $_POST['bienes'],
                'institucion' => $_POST['institucion'],
                'grupo' => $_POST['grupo'],
                'sub_grupo' => $_POST['sub_grupo'],
                'seccion' => $_POST['seccion'],
                'numero_bien' => $_POST['numero_bien'],
                'caracteristicas_bien' => $_POST['caracteristicas_bien'],
                'serial_bien' => $_POST['serial_bien'],
                'tipo_incorporacion' => $_POST['tipo_incorporacion'],
                'fecha_adquisicion' => $_POST['fecha_adquisicion'],
                'procedencia_bien' => $_POST['procedencia_bien'],
                'valor_bien' => $_POST['valor_bien'],
                'ubicacion_almacen' => $_POST['ubicacion_almacen'],
                'observacion' => $_POST['observacion'],
                'date' => $date,
                'estatus' => 1,
                'gerencia_responsable' => 5,                             
            );

            $incorporacion = InventarioModel::insertarBien($datosBien);

            if ($incorporacion)
            {
               echo "<script>
                        alert('Bien Registrado Correctamente')                        
                     </script>";                      
            }
            else
            {
               echo "<script>
                        alert('El Num de Bien ya se Encuentra Registrado')
                    </script>"; 
            }

        }
    }

    public function consultaInventario()
    {
        $resultado = InventarioModel::consultaInventario();
        return $resultado;
    }

}


