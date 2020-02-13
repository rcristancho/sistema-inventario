<?php

require_once "../app/models/EmpleadosModel.php";

class EmpleadosController
{

    public function consulta()
    {
        $resultado = EmpleadosModel::consulta();
        return $resultado;
    }

    public function registro()
    {
        if (isset($_POST["submit"])) {
            $datos = array(
                'cedula'      => pg_escape_string($_POST["cedula"]),
                'nombre'      => pg_escape_string($_POST["nombre"]),
                'apellido'    => pg_escape_string($_POST["apellido"]),
                'email'       => pg_escape_string($_POST["email"]),
                'cargo'       => pg_escape_string($_POST["cargo"]),
                'gerencia'    => pg_escape_string($_POST["gerencia"]),
                'institucion' => pg_escape_string($_POST["institucion"]),
            );

            if ($_POST["submit"] == 'save') {
                
                $respuesta = EmpleadosModel::insert($datos);
                
                if (pg_result_status($respuesta)) {
                    echo "<script>alert('Registrado correctamente!');</script>";
header('Location: /sib/public/index.php');
                }else{
                    echo "<script>alert('Ha ocurrido un error. Comunicarse con el Administrador.');</script>";
header('Location: /sib/public/index.php');
                }

            }elseif ($_POST["submit"] == 'edit') {

                $respuesta = EmpleadosModel::update($datos);
                
                if (pg_result_status($respuesta)) {
                    echo "<script>alert('Actualizado correctamente!');</script>";
header('Location: /sib/public/index.php');
                }else{
                    echo "<script>alert('Ha ocurrido un error. Comunicarse con el Administrador.');</script>";
header('Location: /sib/public/index.php');
                }
            }
        }
    }
}


