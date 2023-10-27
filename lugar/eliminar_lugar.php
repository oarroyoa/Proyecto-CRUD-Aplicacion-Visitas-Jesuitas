<!DOCTYPE html>
<!--Óscar Arroyo Aguadero -->
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="../style/styles.css">
    <title>Eliminar Lugar</title>
</head>
<body>
<h1>Eliminar Lugar</h1>
<form method="post" action="eliminar_lugar.php">
    <label for="ip">IP:</label>
    <input type="text" id="ip" name="ip" required><br>
    <input type="submit" value="Eliminar lugar seleccionado">
    <?php
    require ('LugarCRUD.php');
    if (isset($_POST['ip'])) {

        $crud = new LugarCRUD();

        $ip = $_POST['ip'];
        $visita = $crud->consultarLugar($ip);
        if(!empty($visita)){
            $mensaje = $crud->eliminarLugar($ip);
            echo "<p>" . $mensaje . "</p>";
        }else{
            echo "</br>No se ha encontrado el lugar a eliminar";
        }
    }
    ?>
</form>
<br>
<a href="agregar_lugar.php">Agregar Lugar</a><br>
<a href="listar_lugar.php">Listar Lugar</a><br>
<a href="modificar_lugar.php">Modificar Lugar</a>
</body>
</html>
