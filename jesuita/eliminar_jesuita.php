<!DOCTYPE html>
<!--Óscar Arroyo Aguadero -->
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="../style/styles.css">
    <title>Eliminar Jesuita</title>
</head>
<body>
<h1>Eliminar Jesuita</h1>
    <form method="post" action="eliminar_jesuita.php">
        <label for="idJesuita">Número de puesto:</label>
        <input type="text" name="idJesuita" required><br>
    <input type="submit" value="Eliminar Jesuita seleccionado">
        <?php
        require('JesuitaCRUD.php');
        if (isset($_POST['idJesuita'])) {

            $crud = new JesuitaCRUD();

            $idJesuita = $_POST['idJesuita'];
            $visita = $crud->consultarJesuita($idJesuita);
            if(!empty($visita)){
                $mensaje = $crud->eliminarJesuita($idJesuita);
            echo "<p>" . $mensaje . "</p>";
            }else{
                echo "</br>No se ha encontrado el lugar a eliminar";
            }
        }
        ?>
</form>
<br>
<a href="agregar_jesuita.php">Agregar Jesuita</a><br>
<a href="listar_jesuita.php">Listar Jesuita</a><br>
<a href="modificar_jesuita.php">Modificar Jesuita</a>
</body>
</html>
