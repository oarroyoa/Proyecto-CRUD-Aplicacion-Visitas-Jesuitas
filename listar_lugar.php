<!DOCTYPE html>
<!--Óscar Arroyo Aguadero -->
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Listar Lugares</title>
</head>
<body>
<h1>Listar Lugares</h1>
    <table>
        <tr>
            <th>IP</th>
            <th>Lugar</th>
            <th>Descripción</th>
        </tr>
        <?php
        require_once ('LugarCRUD.php');
        require('config.php');
        $crud = new LugarCRUD(hostBBDD,usuarioBBDD,contraBBDD,nombreBBDD);
        $lugares = $crud->obtenerLugares();
        foreach ($lugares as $lugar) {
            echo "<tr>";
            echo "<td>" . $lugar['ip'] . "</td>";
            echo "<td>" . $lugar['lugar'] . "</td>";
            echo "<td>" . $lugar['descripcion'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
<br>
<a href="agregar_lugar.php">Agregar Lugar</a><br>
<a href="modificar_lugar.php">Modificar Lugar</a><br>
<a href="eliminar_lugar.php">Eliminar Lugar</a>
</body>
</html>