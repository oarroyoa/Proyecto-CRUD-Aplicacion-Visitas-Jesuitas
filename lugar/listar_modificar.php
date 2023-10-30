<?php
include('interfaz.php');
imprimirCabecera("Modificar Lugar");
require('LugarCRUD.php');
$crud = new LugarCRUD();
echo "<form method='get' action='listar_modificar.php'>";
if (isset($_GET['ip'])) {
    $ip = $_GET['ip'];
    $visita = $crud->consultarLugar($ip);

    if (!empty($visita)) {
        echo "<label for='ip'>IP:</label>";
        echo "<input type='text' name='ip' value='" . $visita['ip'] . "' readonly>";
        echo "<label for='lugar'>Lugar:</label>";
        echo "<input type='text' name='lugar' value='" . $visita['lugar'] . "'>";
        echo "<label for='descripcion'>Descripción:</label>";
        echo "<input type='text' name='descripcion' value='" . $visita['descripcion'] . "'>";
        echo "<input type='submit' value='Modificar lugar seleccionado'>";

        // Obtener valores de $_GET si están definidos
        $ip = $_GET['ip'];
        $lugar = $_GET['lugar'] ?? '';
        $descripcion = $_GET['descripcion'] ?? '';

        if (!empty($ip) && !empty($lugar)) {
            $mensaje = $crud->modificarLugar($ip, $lugar, $descripcion);
            echo "<p>" . $mensaje . "</p>";
        } else {
            echo "<p>IP y Lugar son campos obligatorios.</p>";
        }
    } else {
        echo "<p>No existe un lugar con la IP proporcionada.</p>";
        echo "<a href='../index.html'>Volver al Inicio</a></br>";
    }
}
echo "</form>";
imprimirPie("Modificar Lugar");
?>
