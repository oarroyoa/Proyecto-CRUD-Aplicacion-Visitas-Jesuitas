<?php
/* Óscar Arroyo Aguadero */

class LugarCRUD
{
    private $conn;
    public $errno;
    private $mysqli;

    public function __construct()
    {
        require('../config/configDB.php');
        $this->conn = new mysqli(BBDD_HOST, BBDD_USUARIO, BBDD_PASSWORD, BBDD_NOMBRE);
        $this->mysqli = $this->conn;

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

        if ($this->mysqli->query($query)) {
            $mensaje = "Lugar agregado correctamente.";
        } else {
            $mensaje = "Error al agregar el lugar: " . $this->mysqli->error;
        }

        return $mensaje;
    }

    public function modificarLugar($ip, $lugar, $descripcion)
    {
        $query = "UPDATE lugar SET lugar = '$lugar', descripcion = '$descripcion' WHERE ip = '$ip'";
        $mensaje = "";

        if ($this->mysqli->query($query)) {
            $mensaje = "Lugar modificado correctamente.";
        } else {
            $mensaje = "Error al modificar el lugar: " . $this->mysqli->error;
        }

        return $mensaje;
    }

    public function eliminarLugar($ip)
    {
        $query = "DELETE FROM lugar WHERE ip = '$ip'";
        $mensaje = "";

        if ($this->mysqli->query($query)) {
            $mensaje = "Lugar eliminado correctamente.";
        } else {
            $mensaje = "Error al eliminar el lugar: " . $this->mysqli->error;
        }

        return $mensaje;
    }

    public function obtenerLugares()
    {
        $query = "SELECT * FROM lugar";
        $result = $this->mysqli->query($query);
        $lugares = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $lugares[] = $row;
            }
        } else {
            $lugares = "Error al obtener los lugares: " . $this->mysqli->error;
        }

        return $lugares;
    }

    public function consultarLugar($ip)
    {
        $query = "SELECT * FROM lugar WHERE ip = '$ip'";
        $result = $this->mysqli->query($query);
        $lugar = [];

        if ($result) {
            $lugar = $result->fetch_assoc();
        } else {
            $lugar = "Error al consultar el lugar: " . $this->mysqli->error;
        }

        return $lugar;
    }
}


