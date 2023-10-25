<!DOCTYPE html>
<!--Óscar Arroyo Aguadero -->
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Eliminar Lugar</title>
</head>
<body>
<h1>Eliminar Lugar</h1>
<form method="post" action="eliminar_lugar.php">
    <label for="ip">IP:</label>
    <input type="text" name="ip" required><br>
    <input type="submit" value="Eliminar lugar seleccionado">
    <?php
    require ('LugarCRUD.php');
    if (isset($_POST['ip'])) {

        $crud = new LugarCRUD("localhost", "root", "", "jesuita1");

        $ip = $_POST['ip'];

        $mensaje = $crud->eliminarLugar($ip);

        echo "<p>" . $mensaje . "</p>";
    }
    ?>
</form>
<br>
<a href="agregar_lugar.php">Agregar Lugar</a><br>
<a href="listar_lugar.php">Listar Lugar</a><br>
<a href="modificar_lugar.php">Modificar Lugar</a>
</body>
</html>
