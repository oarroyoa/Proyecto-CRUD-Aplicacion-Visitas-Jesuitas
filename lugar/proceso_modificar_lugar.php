<?php
include('interfaz.php');
imprimirCabecera("Modificar Lugar");
require('LugarCRUD.php');
echo "<form method='post' action='proceso_modificar_lugar.php'>";
if (isset($_POST['ip'])) {
    $crud = new LugarCRUD();
    $ip = $_POST['ip'];
    $lugar = $crud->consultarLugar($ip);
    // Verificar si el Lugar existe antes de consultarlo
    if (!empty($lugar)) {

        echo "<label for='ip'>IP:</label>";
        echo "<input type='text' name='ip' value='" . $lugar['ip'] . "' readonly>";
        echo "<label for='lugar'>Lugar:</label>";
        echo "<input type='text' name='lugar' value='" . $lugar['lugar'] . "'>";
        echo "<label for='descripcion'>Descripción:</label>";
        echo "<input type='text' name='descripcion' value='" . $lugar['descripcion'] . "'>";

        // Obtener valores de $_POST si están definidos
        $lugar = $_POST['lugar'] ?? '';

        $descripcion = $_POST['descripcion'] ?? '';

        if (!empty($ip) && !empty($lugar)) {
            $mensaje = $crud->modificarLugar($ip, $lugar, $descripcion);
            echo "<p>" . $mensaje . "</p>";
        } else {
            echo "<p>IP, Lugar y Descripción son campos obligatorios.</p>";
        }
    } else {
        echo "<p>No existe un Lugar con la IP proporcionada.</p>";
        echo "<a href='../index.html'>Volver al Inicio</a></br>";
    }
    echo "<input type='submit' value='Modificar Lugar seleccionado'>";
    echo "</form>";
}
imprimirPie("Modificar Lugar");
?>
