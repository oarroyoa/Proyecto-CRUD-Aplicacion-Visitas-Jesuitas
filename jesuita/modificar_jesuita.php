
<?php
    include('interfaz.php');
    imprimirCabecera("Modificar Jesuita");
    echo "<form method='post' action='proceso_modificar_jesuita.php'>
    <label for='idJesuita'>Número de puesto:</label>
    <input type='text' id='idJesuita' name='idJesuita' required><br>
    <input type='submit' value='Modificar Jesuita seleccionado'>";
    require ('JesuitaCRUD.php');
    if (isset($_POST['idJesuita'])) {

        $crud = new JesuitaCRUD();
        $idJesuita = $_POST['idJesuita'];
        $visita= $crud->consultarJesuita($idJesuita);
    }
    echo "</form>";
    imprimirPie("Modificar Jesuita");
    ?>
