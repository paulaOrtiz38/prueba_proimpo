<?php
/**
 * summary
 */
class Usuario
{
    private $conexion;
    private $table_name = "usuarios";
    public $id;
    public $nombre;
    public $apellido;
    public $usuario;
    public $paswword;

    public function __construct($db){
        $this->conexion = $db;
    }

     function crearUsuario(){
        $sql = "INSERT INTO " . $this->table_name . " (nombre,apellido,usuario,password)
                values ('$this->nombre','$this->apellido','$this->usuario','$this->password')";

        $result = mysqli_query($this->conexion,$sql);

        return $result;

    }

    function buscarUsuarios(){
        $sql="SELECT * FROM ".$this->table_name." WHERE usuario='$this->usuario'";
        $result = mysqli_query($this->conexion,$sql);
        $user = $result->fetch_assoc();

        return $user;
    }

    function verUsuarios(){
        $sql = "SELECT * FROM ".$this->table_name;
        $result = mysqli_query($this->conexion,$sql);
        $users = $result->fetch_assoc();
        return $users;
    }

    public function buscaRepetido($user){
        $sql  =  "SELECT * from usuarios
            where usuario='$user'";
        $result=mysqli_query($this->conexion,$sql);

        if(mysqli_num_rows($result) > 0){
            return 1;
        }else{
            return 0;
        }
    }

    public static function verificarHash($pass,$hash){

            if (password_verify($pass, $hash)) {
                return true;
            } else {
                return false;
            }
    }

    public static function encriptar($pass)
    {
        $opciones = [
            'cost' => 11,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ];
        $consulta  =  password_hash($pass, PASSWORD_BCRYPT, $opciones);

        return $consulta;

    }
}
