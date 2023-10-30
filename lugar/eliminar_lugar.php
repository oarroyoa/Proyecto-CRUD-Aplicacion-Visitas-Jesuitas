<?php
include('interfaz.php');
imprimirCabecera("Eliminar Lugar");
require('LugarCRUD.php');
echo "<form method='post' action='eliminar_lugar.php'>
       <label for='ip'>IP:</label>
       <input type='text' name='ip' required><br>
        <input type='submit' value='Eliminar Lugar seleccionado'>";
if (isset($_POST['ip'])) {
    $crud = new LugarCRUD();

    $ip = $_POST['ip'];
    $lugar = $crud->consultarLugar($ip);
    if (!empty($lugar)) {
        $mensaje = $crud->eliminarLugar($ip);
        echo "<p>" . $mensaje . "</p>";
    } else {
        echo "</br>No se ha encontrado el lugar a eliminar";
    }
}
echo "</form>";
imprimirPie("Eliminar Lugar");
?>
