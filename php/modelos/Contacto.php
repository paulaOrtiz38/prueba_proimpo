<?php
/**
 * summary
 */
class Contacto
{
    private $conexion;
    private $table_name = "contactos";
    public $id;
    public $con_nombres;
    public $con_apellidos;
    public $con_cedula;
    public $con_email;
    public $con_movil;
    public $con_direccion;
    public $con_observaciones;

    public function __construct($db){
        $this->conexion = $db;
    }

     function crearContacto(){
        $sql = "INSERT INTO " . $this->table_name . " (con_nombres,con_apellidos,con_email,con_direccion,con_movil,con_cedula,con_observaciones)
                values ('$this->con_nombres','$this->con_apellidos','$this->con_email',
                       '$this->con_direccion','$this->con_movil','$this->con_cedula','$this->con_observaciones')";

        $result = mysqli_query($this->conexion,$sql);

        return $result;
    }

    function verContactos(){
        $sql = "SELECT * FROM ".$this->table_name;
        $result = mysqli_query($this->conexion,$sql);
        $contactos = $result->fetch_all();


        return $contactos;
    }

    function verContacto($id){
        $sql = "SELECT * FROM ".$this->table_name." WHERE id=".$this->id;
        $result = mysqli_query($this->conexion,$sql);
        $contactos = $result->fetch_all();


        return $contactos;
    }
}
