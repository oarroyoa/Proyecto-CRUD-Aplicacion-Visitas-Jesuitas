

<!DOCTYPE html>
<!--Óscar Arroyo Aguadero -->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Agregar Jesuita</title>
</head>
<body>
<h1>Agregar Jesuita</h1>
<form method="post" action="agregar_jesuita.php">
    <label for="idJesuita">ID Jesuita:</label>
    <input type="text" name="idJesuita" required><br>

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required><br>

    <label for="firma">Firma:</label>
    <input type="text" name="firma" required><br>

    <input type="submit" value="Agregar Jesuita">
</form>
    <?php
    require ("JesuitaCRUD.php");

    if (isset($_POST['idJesuita']) && isset($_POST['nombre']) && isset($_POST['firma'])) {
        try {
            // Datos del formulario
            $idJesuita = $_POST["idJesuita"];
            $nombre = $_POST["nombre"];
            $firma = $_POST["firma"];

            // Instanciamos la clase JesuitaCRUD
            $crud = new JesuitaCRUD("localhost", "root", "", "jesuita1");

            // Intentamos agregar el Jesuita
            $mensaje = $crud->agregarJesuita($idJesuita, $nombre, $firma);

            echo "<p>$mensaje</p>";
        }   catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) {
                $mensaje = "Clave única duplicada";
                echo "<p>".$mensaje."</p>";
            }
        }
    }
    ?>
<br>
<a href="eliminar_jesuita.php">Eliminar Jesuita</a><br>
<a href="modificar_jesuita.php">Modificar Jesuita</a>

</body>
</html>
