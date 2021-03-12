<?php

	require_once "conexion.php";
    require_once "modelos/Contacto.php";

    try {

        $conexion  =  conexion();

        $contacto    = new Contacto($conexion);
        $contacto->con_nombres           = $_POST['con_nombres'];
        $contacto->con_apellidos         = $_POST['con_apellidos'];
        $contacto->con_cedula            = $_POST['con_cedula'];
        $contacto->con_email             = $_POST['con_email'];
        $contacto->con_direccion         = $_POST['con_direccion'];
        $contacto->con_movil             = $_POST['con_movil'];
        $contacto->con_observaciones     = $_POST['con_observaciones'];
        $result = $contacto->crearContacto();

        if($result){
            echo json_encode(array('success' => 1,'resultado' => $contacto));
        }else{
            echo json_encode(array('success' => 0 ,'resultado' => null));
        }
    } catch (\Throwable $e) {
        echo json_encode(array('error' => $e->getMessage()));
    }

 ?>
