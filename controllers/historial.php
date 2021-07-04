<?php
session_start();
include('../models/coneccion.php');
$opcion = $_POST['opcion'];
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
switch ($opcion) {
    case '1': //listar
        $pacientes = "SELECT *  FROM pacientes ";
        $paciente = mysqli_query($conexion, $pacientes);
        $arreglo = array();
        while ($rows = $paciente->fetch_array()) {
            $arreglo[] = array(
                'id_paciente' => $rows['id_paciente'],
                'nombre' => $rows['nombre'],
                'paterno' => $rows['a_paterno'],
                'materno' => $rows['a_materno'],
                'telefono' => $rows['telefono']
            );
        }

        if ($paciente) {
            echo json_encode($arreglo);
        } else {
            echo json_encode(array('agregado' => 0));
        }


    break;
    case '2': //ver historial
        $fecha_actual = date("Y-m-d");
        // $date_future = date("Y-m-d",strtotime($fecha_actual."+ 15 days"));
        // $date_past = date ("Y-m-d",strtotime($fecha_actual."- 6 days"));
        $id_paciente = $_POST['id'];
        $pacientes = "SELECT *  FROM notificaciones WHERE id_paciente = $id_paciente ";
        $paciente = mysqli_query($conexion, $pacientes);
        $arreglo = array();
        
        while ($rows = $paciente->fetch_array()) {
            if ($fecha_actual <= $rows['fecha']) {
                $paso = "success";
                $mensaje = "Activa";
            }
            else{
                $paso = "danger";
                $mensaje = "Vencida";

            }
            $arreglo[] = array(
                
                'id_paciente' => $rows['id_paciente'],
                'fecha' => $rows['fecha'],
                'notificacion' => $rows['notificacion'],
                'paso'=> $paso,
                'mensaje' => $mensaje

                // 'materno' => $rows['a_materno'],
                // 'telefono' => $rows['telefono']
            );
        }

        if ($paciente) {
            echo json_encode($arreglo);
        } else {
            echo json_encode(array('agregado' => 0));
        }


    break;
}
