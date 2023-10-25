<!DOCTYPE html>
<!-- Óscar Arroyo Aguadero -->
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Modificar Lugar</title>
</head>
<body>
<h1>Modificar Lugar</h1>
<form method="post" action="proceso_modificar_lugar.php">
    <?php
    require('config.php');
    require('LugarCRUD.php');
    $crud = new LugarCRUD(hostBBDD,usuarioBBDD,contraBBDD,nombreBBDD);

    if (isset($_POST['ip'])) {
        $ip = $_POST['ip'];
        $visita = $crud->consultarLugar($ip);

        if (!empty($visita)) {
            echo "<label for='ip'>IP:</label>";
            echo "<input type='text' name='ip' value='" . $visita['ip'] . "'>";
            echo "<label for='lugar'>Lugar:</label>";
            echo "<input type='text' name='lugar' value='" . $visita['lugar'] . "'>";
            echo "<label for='descripcion'>Descripción:</label>";
            echo "<input type='text' name='descripcion' value='" . $visita['descripcion'] . "'>";

            // Obtener valores de $_POST si están definidos
            $ip = $_POST['ip'] ?? '';
            $lugar = $_POST['lugar'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';

            if (!empty($ip) && !empty($lugar) && !empty($descripcion)) {
                $mensaje = $crud->modificarLugar($ip, $lugar, $descripcion);
                echo "<p>" . $mensaje . "</p>";
            } else {
                echo "<p>IP, Lugar y Descripción son campos obligatorios.</p>";
            }
        } else {
            echo "<p>No existe un lugar con la IP proporcionada.</p>";
        }
    }
    ?>
    <input type="submit" value="Modificar lugar seleccionado">
</form>
<br>
<a href="agregar_lugar.php">Agregar Lugar</a><br>
<a href="listar_lugar.php">Listar Lugar</a><br>
<a href="eliminar_lugar.php">Eliminar Lugar</a>
</body>
</html>
