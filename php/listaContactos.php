<?php

    require_once "conexion.php";
    require_once "modelos/Contacto.php";

    try {
        $conexion  =  conexion();
        $contacto    = new Contacto($conexion);
        $contactos = $contacto->verContactos();

    } catch (\Throwable $e) {

        $contactos = array();
        echo 1;
       // echo json_encode(array('error' => $e->getMessage()));
    }
