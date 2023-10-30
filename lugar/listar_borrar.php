<?php
include('interfaz.php');
imprimirCabecera("Eliminar Lugar");
require('LugarCRUD.php');

if (isset($_GET['ip'])) {
    $crud = new LugarCRUD();
    $ip = $_GET['ip'];

    if (isset($_POST['confirmar'])) {
        // El usuario ha confirmado la eliminación
        $mensaje = $crud->eliminarLugar($ip);
        echo "<p>" . $mensaje . "</p>";
    } else {
        // Mostrar el mensaje de confirmación
        echo "<p>¿Desea borrar este lugar?</p>";
        echo "<form method='post' action='listar_borrar.php?ip=$ip'>
            <input type='submit' name='confirmar' value='Si'>
            <input type='submit' name='cancelar' value='No'>
        </form>";
    }
}

imprimirPie("Eliminar Lugar");
?>
