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
        <label for="idJesuita">ID Jesuita:</label>
        <input type="text" name="idJesuita" required><br>
    <input type="submit" value="Eliminar Jesuita seleccionado">
        <?php
        require ('JesuitaCRUD.php');
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
