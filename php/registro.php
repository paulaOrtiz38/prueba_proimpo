<?php

	   require_once "conexion.php";
       require_once "modelos/Usuario.php";

	   $conexion           =  conexion();
       $usuario            =  new Usuario($conexion);
       $usuario->nombre    =  $_POST['nombre'];
       $usuario->apellido  =  $_POST['apellido'];
       $usuario->usuario   =  $_POST['usuario'];
       $usuario->password  = Usuario::encriptar($_POST['password']);

        if($usuario->buscaRepetido($_POST['usuario'])==1){
            echo 2;
        }else{
            $result = $usuario->crearUsuario();
            echo $result;
        }

 ?>
