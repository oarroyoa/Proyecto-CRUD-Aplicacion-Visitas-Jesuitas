<?php
    include ('interfaz.php');
    imprimirCabecera("Listar Jesuita");
    require_once ('JesuitaCRUD.php');
    echo "<table>
       <tr>
           <th>Número de puesto</th>
           <th>Nombre</th>
           <th>Firma</th>
       </tr>";
    $crud = new JesuitaCRUD();
    $jesuitas = $crud->obtenerJesuitas();
    foreach ($jesuitas as $jesuita) {
        echo "<tr>";
        echo "<td>" . $jesuita['idJesuita'] . "</td>";
        echo "<td>" . $jesuita['nombre'] . "</td>";
        echo "<td>" . $jesuita['firma'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    imprimirPie("Listar Jesuita");
        ?>
