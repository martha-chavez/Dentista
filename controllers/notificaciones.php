<?php
session_start();
include('../models/coneccion.php');

$id_usuario =  $_SESSION["id"];
$opcion = $_POST['opcion'];


switch ($opcion) {
    case '1':
        $contenido = $_POST['contenido'];
        $fecha1 = $_POST['fecha'];
        $id_paciente = $_POST['id_paciente'];
        // date("Y-m-d H:i:s");  
        $fecha = date("Y-m-d H:i", strtotime($fecha1));
        // echo($id_paciente. $fecha. $contenido);

        $nuevoUsuario = "INSERT INTO notificaciones (id_paciente, fecha, notificacion) 
            VALUES ('$id_paciente', '$fecha','$contenido')  ";
        $resultado = mysqli_query($conexion, $nuevoUsuario);
        $notificaciones = "SELECT * FROM notificaciones";
        $notificacion = mysqli_query($conexion, $notificaciones);
        $cantidad = $notificacion->num_rows;
        if ($resultado) {
            echo json_encode(array(
                'agregado' => 1,
                'cantidad' => $cantidad
            ));
        } else {
            echo json_encode(array('agregado' => 0)).$nuevoUsuario.$conexion->error;
        }
        break;
    case '2':
        $notificaciones = "SELECT nt.id_notificacion,nt.fecha, nt.notificacion ,pc.nombre, pc.a_paterno, pc.a_materno FROM notificaciones nt, pacientes pc WHERE nt.id_paciente= pc.id_paciente ";
        $notificacion = mysqli_query($conexion, $notificaciones);
        $arreglo = array();
        $cantidad = $notificacion->num_rows;
        // print_r($arreglo);
        while ($rows = $notificacion->fetch_array()) {
            // print_r($arreglo);

            $arreglo[] = array(
                'id_notificacion' => $rows['id_notificacion'],
                'fecha' => $rows['fecha'],
                'notificacion' => $rows['notificacion'],
                'nombre' => $rows['nombre']." ".$rows['a_paterno']." ".$rows['a_materno'],
                'cantidad' => $cantidad
            );
        }

        if ($notificacion) {
            echo json_encode($arreglo);
        } else {
            echo json_encode(array('agregado' => 0));
        }
        break;
    case '3': //eliminar
        $id = (isset($_POST['id'])) ? $_POST['id'] : '';
        $consulta = "DELETE FROM notificaciones WHERE id_notificacion='$id' ";
        $eliminar = mysqli_query($conexion, $consulta);
        $consulta = "SELECT nt.id_notificacion,nt.fecha, nt.notificacion ,pc.nombre, pc.a_paterno, pc.a_materno FROM notificaciones nt, pacientes pc WHERE nt.id_paciente= pc.id_paciente";
        $notificacion = mysqli_query($conexion, $consulta);
        $arreglo = array();
        while ($rows = $notificacion->fetch_array()) {
            $arreglo[] = array(
                'id_notificacion' => $rows['id_notificacion'],
                'fecha' => $rows['fecha'],
                'notificacion' => $rows['notificacion'],
                'nombre' => $rows['nombre']." ".$rows['a_paterno']." ".$rows['a_materno'],

            );
        }

        if ($notificacion) {
            echo json_encode($arreglo);
        } else {
            echo json_encode(array('agregado' => 0));
        }
        break;

    //llena el select de pacientes en cita
    case '4':
        $pacientesselect = "SELECT * FROM pacientes";
        $pacientes = mysqli_query($conexion, $pacientesselect);
        $arreglo = array();
        while ($rows = $pacientes->fetch_array()) {

            $arreglo[] = array(
                'id_paciente' => $rows['id_paciente'],
                'nombre' => $rows['nombre'],
                'materno' => $rows['a_materno'],
                'paterno' => $rows['a_paterno']
            );
        }

        if ($pacientes) {
            echo json_encode($arreglo);
        } else {
            echo json_encode(array('agregado' => 0));
        }
        break;
        case '5':
        $contenido = $_POST['notificacion'];
        $fecha1 = $_POST['fecha'];
        $id_cita = $_POST['id'];
        // date("Y-m-d H:i:s");  
        $fecha = date("Y-m-d H:i", strtotime($fecha1));
        // echo($id_paciente. $fecha. $contenido);

        $EdisCita = " UPDATE notificaciones SET id_notificacion= '$id_cita', notificacion='$contenido', fecha='$fecha' WHERE id_notificacion ='$id_cita'";
        $resultado = mysqli_query($conexion, $EdisCita);
        $consulta = "SELECT nt.id_notificacion,nt.fecha, nt.notificacion ,pc.nombre, pc.a_paterno, pc.a_materno FROM notificaciones nt, pacientes pc WHERE nt.id_paciente= pc.id_paciente";
        $notificacion = mysqli_query($conexion, $consulta);
        $arreglo = array();
        while ($rows = $notificacion->fetch_array()) {
            $arreglo[] = array(
                'id_notificacion' => $rows['id_notificacion'],
                'fecha' => $rows['fecha'],
                'notificacion' => $rows['notificacion'],
                'nombre' => $rows['nombre']." ".$rows['a_paterno']." ".$rows['a_materno'],

            );
        }
        if ($notificacion) {
            echo json_encode($arreglo);
        } else {
            echo json_encode(array('agregado' => 0));
        }
        break;
            break;
       
}
