<?php
/*Óscar Arroyo Aguadero*/
class JesuitaCRUD
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

    public function agregarJesuita($idJesuita, $nombre, $firma)
    {
        $query = "INSERT INTO jesuita (idJesuita, nombre, firma) VALUES ('$idJesuita', '$nombre', '$firma')";
        $mensaje = "";
        if (mysqli_query($this->conn, $query)) {
            $mensaje = "Jesuita agregado correctamente.";
        } else {
            $mensaje = "Error al agregar el jesuita: " . mysqli_error($this->conn);
        }
        return $mensaje;
    }


    public function modificarJesuita($idJesuita, $nombre, $firma)
    {
        $query = "UPDATE jesuita SET nombre = '$nombre', firma = '$firma' WHERE idJesuita = '$idJesuita'";
        $mensaje = "";
        if (mysqli_query($this->conn, $query)) {
            $mensaje = "Jesuita modificado correctamente.";
        } else {
            $mensaje = "Error al modificar el jesuita: " . mysqli_error($this->conn);
        }
        return $mensaje;
    }

    public function eliminarJesuita($idJesuita)
    {
        $query = "DELETE FROM jesuita WHERE idJesuita = '$idJesuita'";
        $mensaje = "";
        if (mysqli_query($this->conn, $query)) {
            $mensaje = "Jesuita eliminado correctamente.";
        } else {
            $mensaje = "Error al eliminar el jesuita: " . mysqli_error($this->conn);
        }
        return $mensaje;
    }

    public function obtenerJesuitas()
    {
        $query = "SELECT * FROM jesuita";
        $result = mysqli_query($this->conn, $query);
        $jesuitas = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $jesuitas[] = $row;
        }

        return $jesuitas;
    }

    public function consultarJesuita($idJesuita) {
        $query = "SELECT * FROM jesuita where idJesuita = '$idJesuita'";
        $result = mysqli_query($this->conn, $query);

        return mysqli_fetch_assoc($result); // Devuelve la fila como un array asociativo
    }
}

