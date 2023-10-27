<!DOCTYPE html>
<!--Óscar Arroyo Aguadero -->
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="../style/styles.css">
    <title>Listar Jesuita</title>
</head>
<body>
<h1>Listar Jesuita</h1>
    <table>
        <tr>
            <th>Número de puesto</th>
            <th>Nombre</th>
            <th>Firma</th>
        </tr>
        <?php
        require_once ('JesuitaCRUD.php');
        $crud = new JesuitaCRUD();
        $jesuitas = $crud->obtenerJesuitas();
        foreach ($jesuitas as $jesuita) {
            echo "<tr>";
            echo "<td>" . $jesuita['idJesuita'] . "</td>";
            echo "<td>" . $jesuita['nombre'] . "</td>";
            echo "<td>" . $jesuita['firma'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
<br>
<a href="agregar_jesuita.php">Agregar Jesuita</a><br>
<a href="modificar_jesuita.php">Modificar Jesuita</a><br>
<a href="eliminar_jesuita.php">Eliminar Jesuita</a>
</body>
</html>