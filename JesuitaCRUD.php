<?php
/*Óscar Arroyo Aguadero*/
class JesuitaCRUD
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

    public function agregarJesuita($idJesuita, $nombre, $firma)
    {
        $query = "INSERT INTO jesuita (idJesuita, nombre, firma) VALUES ($idJesuita, '$nombre', '$firma')";

        if (mysqli_query($this->conn, $query)) {
            return "Jesuita agregado correctamente.";
        } else {
            return "Error al agregar el Jesuita: " . mysqli_error($this->conn);
        }
    }


    public function modificarJesuita($idJesuita, $nombre, $firma)
    {
        $query = "UPDATE jesuita SET nombre = '$nombre', firma = '$firma' WHERE idJesuita = '$idJesuita'";

        if (mysqli_query($this->conn, $query)) {
            return "Jesuita modificado correctamente.";
        } else {
            $this->errno = $this->conn->errno; // Guardar el código de error
            return "Error al modificar el Jesuita: " . mysqli_error($this->conn);
        }
    }

    public function eliminarJesuita($idJesuita)
    {
        $query = "DELETE FROM jesuita WHERE idJesuita = '$idJesuita'";

        if (mysqli_query($this->conn, $query)) {
            return "Jesuita eliminado correctamente.";
        } else {
            return "Error al eliminar el Jesuita: " . mysqli_error($this->conn);
        }
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

