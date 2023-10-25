<?php
/*Óscar Arroyo Aguadero*/
class LugarCRUD
{
    private $conn;
    public $errno;
    public function __construct($host, $user, $password, $database)
    {
        $this->conn = new mysqli($host, $user, $password, $database);

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

        if (mysqli_query($this->conn, $query)) {
            return "Lugar agregado correctamente.";
        } else {
            return "Error al agregar el lugar: " . mysqli_error($this->conn);
        }
    }


    public function modificarLugar($ip, $lugar, $descripcion)
    {
        $query = "UPDATE lugar SET lugar = '$lugar', descripcion = '$descripcion' WHERE ip = '$ip'";
        if (mysqli_query($this->conn, $query)) {
            return "Lugar modificado correctamente.";
        } else {
            $this->errno = $this->conn->errno; // Guardar el código de error
            return "Error al modificar el lugar: " . mysqli_error($this->conn);
        }
    }

    public function eliminarLugar($ip)
    {
        $query = "DELETE FROM lugar WHERE ip = '$ip'";

        if (mysqli_query($this->conn, $query)) {
            return "Lugar eliminado correctamente.";
        } else {
            return "Error al eliminar el lugar: " . mysqli_error($this->conn);
        }
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
