<!DOCTYPE html>
<!--Óscar Arroyo Aguadero -->
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Modificar Jesuita</title>
</head>
<body>
<h1>Modificar Jesuita</h1>
<form method="post" action="proceso_modificar_jesuita.php">
    <label for="idJesuita">ID Jesuita:</label>
    <input type="text" name="idJesuita" required><br>
    <input type="submit" value="Modificar Jesuita seleccionado">
    <?php
    require ('JesuitaCRUD.php');
    require('config.php');

    if (isset($_POST['idJesuita'])) {

        $crud = new JesuitaCRUD(hostBBDD,usuarioBBDD,contraBBDD,nombreBBDD);
        $idJesuita = $_POST['idJesuita'];
        $visita= $crud->consultarJesuita($idJesuita);
    }
    ?>
</form>

<br>
<a href="agregar_jesuita.php">Agregar Jesuita</a><br>
<a href="listar_jesuita.php">Listar Jesuita</a><br>
<a href="eliminar_jesuita.php">Eliminar Jesuita</a>
</body>
</html>
