<!DOCTYPE html>
<!--Óscar Arroyo Aguadero -->
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Modificar Lugar</title>
</head>
<body>
<h1>Modificar Lugar</h1>
<form method="post" action="proceso_modificar_lugar.php">
    <label for="ip">IP:</label>
    <input type="text" name="ip" required><br>
    <input type="submit" value="Modificar lugar seleccionado">
    <?php
    require ('LugarCRUD.php');
    if (isset($_POST['ip'])) {

        $crud = new LugarCRUD("localhost", "root", "", "jesuita1");

        $ip = $_POST['ip'];
        $visita= $crud->consultarLugar($ip);
    }
    ?>
</form>

<br>
<a href="agregar_lugar.php">Agregar Lugar</a><br>
<a href="listar_lugar.php">Listar Lugar</a><br>
<a href="eliminar_lugar.php">Eliminar Lugar</a>
</body>
</html>
