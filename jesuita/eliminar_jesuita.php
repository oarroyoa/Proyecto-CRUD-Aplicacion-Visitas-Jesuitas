<?php
    include('interfaz.php');
    imprimirCabecera("Eliminar Jesuita");
    require('JesuitaCRUD.php');
    echo "<form method='post' action='eliminar_jesuita.php'>
       <label for='idJesuita'>Número de puesto:</label>
       <input type='text' name='idJesuita' required><br>
        <input type='submit' value='Eliminar Jesuita seleccionado'>";
    if (isset($_POST['idJesuita'])) {
        $crud = new JesuitaCRUD();

        $idJesuita = $_POST['idJesuita'];
        $visita = $crud->consultarJesuita($idJesuita);
        if(!empty($visita))
            {$mensaje = $crud->eliminarJesuita($idJesuita);
            echo "<p>" . $mensaje . "</p>";
            }else{
                echo "</br>No se ha encontrado el jesuita a eliminar";
            }
        }
        echo"</form>";
        imprimirPie("Eliminar Jesuita");
        ?>
