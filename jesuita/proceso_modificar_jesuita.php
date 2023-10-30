<?php
    include('interfaz.php');
    imprimirCabecera("Modificar Jesuita");
    require('JesuitaCRUD.php');
    echo "<form method='post' action='proceso_modificar_jesuita.php'>";
    if (isset($_POST['idJesuita'])) {
        $crud = new JesuitaCRUD();
        $idJesuita = $_POST['idJesuita'];
        $visita = $crud->consultarJesuita($idJesuita);
        // Verificar si el Jesuita existe antes de consultarlo
        if (!empty($visita)) {

            echo "<label for='idJesuita'>Número de puesto:</label>";
            echo "<input type='text' name='idJesuita' value='" . $visita['idJesuita'] . "' readonly>";
            echo "<label for='nombre'>Nombre:</label>";
            echo "<input type='text' name='nombre' value='" . $visita['nombre'] . "'>";
            echo "<label for='firma'>Firma:</label>";
            echo "<input type='text' name='firma' value='" . $visita['firma'] . "'>";

            // Obtener valores de $_POST si están definidos
            $nombre = $_POST['nombre'] ?? '';
            $firma = $_POST['firma'] ?? '';

            if (!empty($idJesuita) && !empty($nombre) && !empty($firma)) {
                $mensaje = $crud->modificarJesuita($idJesuita, $nombre, $firma);
                echo "<p>" . $mensaje . "</p>";
            } else {
                echo "<p>ID Jesuita, Nombre y Firma son campos obligatorios.</p>";
            }
        } else {
            echo "<p>No existe un Jesuita con el ID proporcionado.</p>";
            echo "<a href='../index.html'>Volver al Inicio</a></br>";
        }
        echo "<input type='submit' value='Modificar Jesuita seleccionado'>";
        echo "</form>";
    }
    imprimirPie("Modificar Jesuita");
    ?>
