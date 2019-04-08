<?

class Conexion{
    private $host_db = "localhost";
    private $user_db = "root";
    private $pass_db = "root";
    private $db_name = "usuarios";
    private $conexion;

    function __construct(){
        $this->conexion = $this->conexion();
    }

    function conexion (){
        $conexion = new mysqli($this->host_db, $this->user_db, $this->pass_db, $this->db_name);
        return $conexion;
    }

    function query($sql){
        $resultado = mysqli_query($this->conexion, $sql);

        while($row = mysqli_fetch_assoc($resultado)){
            $resultSet[] = $row;
        }
        if(!empty($resultSet)){
            return $resultSet;
        }
    }
}

