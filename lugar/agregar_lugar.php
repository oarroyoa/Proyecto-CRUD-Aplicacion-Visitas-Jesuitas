

<!DOCTYPE html>
<!--Óscar Arroyo Aguadero -->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../style/styles.css">
    <title>Agregar Lugar</title>
</head>
<body>
<h1>Agregar Lugar</h1>
<form method="post" action="agregar_lugar.php">
    <label for="ip">Dirección IP:</label>
    <input type="text" name="ip" required><br>

    <label for="lugar">Lugar:</label>
    <input type="text" name="lugar" required><br>

    <label for="descripcion">Descripción:</label>
    <input type="text" name="descripcion" required><br>

    <input type="submit" value="Agregar Lugar">
</form>
    <?php
    require ("LugarCRUD.php");
    if (isset($_POST['ip']) && isset($_POST['lugar']) && isset($_POST['descripcion'])) {
        try {
            // Datos del formulario
            $ip = $_POST["ip"];
            $lugar = $_POST["lugar"];
            $descripcion = $_POST["descripcion"];

            // Instanciamos la clase JesuitaCRUD
            $crud = new LugarCRUD();

            // Intentamos agregar el lugar
            $mensaje = $crud->agregarLugar($ip, $lugar, $descripcion);

            echo "<p>$mensaje</p>";
        }   catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) {
                $mensaje = "Esta IP ya ha sido introducida previamente.";
                echo "<p>".$mensaje."</p>";
            }
        }
    }
    ?>
<br>
<a href="eliminar_lugar.php">Eliminar Lugar</a><br>
<a href="listar_lugar.php">Listar Lugar</a><br>
<a href="modificar_lugar.php">Modificar Lugar</a>

</body>
</html>
