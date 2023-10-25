<!DOCTYPE html>
<!--Óscar Arroyo Aguadero -->
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Modificar Jesuita</title>
</head>
<body>
<h1>Modificar Jesuita</h1>
<form method="post" action="modificar_jesuita.php">
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Firma</th>
            <th>Seleccionar</th>
        </tr>
        <?php
        require_once ('JesuitaCRUD.php');
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
    Nuevo Nombre: <input type="text" name="nombre"><br>
    Nueva Firma: <input type="text" name="firma"><br>
    <input type="submit" value="Modificar Jesuita">
    <?php
    require_once ('JesuitaCRUD.php');
    if (isset($_POST['idJesuita']) && isset($_POST['nombre']) && isset($_POST['firma'])) {

        $idJesuita = $_POST['idJesuita'];
        $nombre = $_POST['nombre'];
        $firma = $_POST['firma'];

        // Verificar si los campos nombre y firma están vacíos
        if (empty($nombre) || empty($firma)) {
            echo "<p>Nombre y Firma son campos obligatorios.</p>";
        } else {
            $crud = new JesuitaCRUD("localhost", "root", "", "jesuita1");
            $mensaje = $crud->modificarJesuita($idJesuita, $nombre, $firma);
            echo "<p>" . $mensaje . "</p>";
        }
    }
    ?>
</form>
<br>
<a href="agregar_jesuita.php">Agregar Jesuita</a><br>
<a href="eliminar_jesuita.php">Eliminar Jesuita</a>
</body>
</html>
