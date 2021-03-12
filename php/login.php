 <?php
	session_start();
    require_once "conexion.php";
    require_once "modelos/Usuario.php";
    try {
    $conexion = conexion();

    $usuario    = new Usuario($conexion);
    $usuario->usuario   = $_POST['usuario'];
    $user = $usuario->buscarUsuarios();

    $pass = Usuario::verificarHash($_POST['password'],$user['password']);

    if($pass){
			$_SESSION['user'] = $user['usuario'];
			echo 1;
		}else{
			echo 0;
		}

	$usuario = $_POST['usuario'];

	} catch (\Throwable $e) {
      //echo 1;
   // echo json_encode(array('error' => $e->getMessage()));
   }

 ?>

