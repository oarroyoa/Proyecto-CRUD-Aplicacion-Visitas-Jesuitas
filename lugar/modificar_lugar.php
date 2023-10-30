<?php
include('interfaz.php');
imprimirCabecera("Modificar Lugar");
echo "<form method='post' action='proceso_modificar_lugar.php'>
    <label for='ip'>IP:</label>
    <input type='text' id='ip' name='ip' required><br>
    <input type='submit' value='Modificar Lugar seleccionado'>";
require ('LugarCRUD.php');
if (isset($_POST['ip'])) {

    $crud = new LugarCRUD();
    $ip = $_POST['ip'];
    $lugar = $crud->consultarLugar($ip);
}
echo "</form>";
imprimirPie("Modificar Lugar");
?>
