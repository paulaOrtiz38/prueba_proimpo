

<?php

class Database
{
    private $host     = "";
    private $db_name  = "";
    private $username = "";
    private $password = "";

    public $conn;

    public function __construct()
    {
        $this->host     = "127.0.0.1";;
        $this->db_name  = "db_prueba_tecnica";;
        $this->username = "root";
        $this->password = "";
    }

    public function getConnection()
    {
        $this->conn = null;
        try {
           // $this->conn = new PDO("mysql:dbname=".$this->db_name.";".$this->host, $this->username, $this->password);
            $this->conn = mysqli_connect($this->host,$this->username, $this->password,$this->db_name);;

        } catch (PDOException $exception) {
            throw new DatabaseException("Connection error: " . $exception->getMessage());
        }

        return $this->conn;
    }
}

	function conexion()
	{

          $database   = new Database();
          $db         = $database->getConnection();
          return $db;
	}

 ?>
