<!DOCTYPE html>
<!--Óscar Arroyo Aguadero -->
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Eliminar Jesuita</title>
</head>
<body>
<h1>Eliminar Jesuita</h1>
    <form method="post" action="eliminar_jesuita.php">
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Firma</th>
                <th>Seleccionar</th>
            </tr>
            <?php
            require_once('JesuitaCRUD.php');
            $crud = new JesuitaCRUD("localhost", "root", "", "jesuita1");
            $jesuitas = $crud->obtenerJesuitas();
            foreach ($jesuitas as $jesuita) {
                echo "<tr>";
                echo "<td>" . $jesuita['idJesuita'] . "</td>";
                echo "<td>" . $jesuita['nombre'] . "</td>";
                echo "<td>" . $jesuita['firma'] . "</td>";
                echo "<td><input type='radio' name='idJesuita' value='" . $jesuita['idJesuita'] . "'></td>";
                echo "</tr>";
            }
        ?>
    </table>
    <input type="submit" value="Eliminar Jesuita seleccionado">
    <?php
        require_once ('JesuitaCRUD.php');
        if (isset($_POST['idJesuita'])) {

            $crud = new JesuitaCRUD("localhost", "root", "", "jesuita1");

            $idJesuita = $_POST['idJesuita'];

            $mensaje = $crud->eliminarJesuita($idJesuita);

            echo "<p>" . $mensaje . "</p>";
        }
        ?>
</form>
<br>
<a href="agregar_jesuita.php">Agregar Jesuita</a><br>
<a href="modificar_jesuita.php">Modificar Jesuita</a>
</body>
</html>
