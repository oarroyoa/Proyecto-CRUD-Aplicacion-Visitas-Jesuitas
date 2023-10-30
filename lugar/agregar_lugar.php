<?php
include("interfaz.php");
imprimirCabecera("Agregar Lugar");
require("LugarCRUD.php");
echo "<form method='post' action='agregar_lugar.php'>
    <label for='ip'>IP:</label>
    <input type='text' id='ip' name='ip' required><br>

    <label for='lugar'>Lugar:</label>
    <input type='text' id='lugar' name='lugar' required><br>

    <label for='descripcion'>Descripción:</label>
    <input type='text' id='descripcion' name='descripcion' required><br>

    <input type='submit' value='Agregar Lugar'>
</form>";
if (isset($_POST['ip']) && isset($_POST['lugar']) && isset($_POST['descripcion'])) {
try {
// Datos del formulario
$ip = $_POST["ip"];
$lugar = $_POST["lugar"];
$descripcion = $_POST["descripcion"];

// Instanciamos la clase LugarCRUD
$crud = new LugarCRUD();

// Intentamos agregar el Lugar
$mensaje = $crud->agregarLugar($ip, $lugar, $descripcion);

echo "<p>$mensaje</p>";
}   catch (mysqli_sql_exception $e) {
if ($e->getCode() == 1062) {
$mensaje = "El Lugar ya existe en la base de datos.";
echo "<p>".$mensaje."</p>";
}
}
}
imprimirPie("Agregar Lugar");
?>
