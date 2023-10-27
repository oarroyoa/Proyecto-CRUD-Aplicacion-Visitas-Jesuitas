<?php
/*Óscar Arroyo Aguadero*/
class LugarCRUD
{
    private $conn;
    public $errno;
    public function __construct()
    {
        require('../config/configDB.php');
        $this->conn = new mysqli(BBDD_HOST, BBDD_USUARIO, BBDD_PASSWORD, BBDD_NOMBRE);

        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    public function __destruct()
    {
        if ($this->conn !== null) {
            $this->conn->close();
        }
    }

    public function agregarLugar($ip, $lugar, $descripcion)
    {
        $query = "INSERT INTO lugar (ip, lugar, descripcion) VALUES ('$ip', '$lugar', '$descripcion')";
        $mensaje = "";
        if (mysqli_query($this->conn, $query)) {
            $mensaje = "Lugar agregado correctamente.";
        } else {
            $mensaje = "Error al agregar el lugar: " . mysqli_error($this->conn);
        }
        return $mensaje;
    }


    public function modificarLugar($ip, $lugar, $descripcion)
    {
        $query = "UPDATE lugar SET lugar = '$lugar', descripcion = '$descripcion' WHERE ip = '$ip'";
        $mensaje = "";
        if (mysqli_query($this->conn, $query)) {
            $mensaje = "Lugar modificado correctamente.";
        } else {
            $mensaje = "Error al modificar el lugar: " . mysqli_error($this->conn);
        }
        return $mensaje;
    }

    public function eliminarLugar($ip)
    {
        $query = "DELETE FROM lugar WHERE ip = '$ip'";
        $mensaje = "";
        if (mysqli_query($this->conn, $query)) {
            $mensaje = "Lugar eliminado correctamente.";
        } else {
            $mensaje = "Error al eliminar el lugar: " . mysqli_error($this->conn);
        }
        return $mensaje;
    }

    public function obtenerLugares()
    {
        $query = "SELECT * FROM lugar";
        $result = mysqli_query($this->conn, $query);
        $lugares = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $lugares[] = $row;
        }

        return $lugares;
    }
    public function consultarLugar($ip) {
        $query = "SELECT * FROM lugar where ip = '$ip'";
        $result = mysqli_query($this->conn, $query);

        return mysqli_fetch_assoc($result); // Devuelve la fila como un array asociativo
    }


}
