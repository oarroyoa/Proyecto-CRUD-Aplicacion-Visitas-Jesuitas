
<?php
    include('interfaz.php');
    imprimirCabecera("Listar Lugar");
    require_once('LugarCRUD.php');
    echo "<table>
           <tr>
               <th>IP</th>
               <th>Lugar</th>
               <th>Firma</th>
           </tr>";
    $crud = new LugarCRUD();
    $lugares = $crud->obtenerLugares();
    foreach ($lugares as $lugar) {
        echo "<tr>";
        echo "<td>" . $lugar['ip'] . "</td>";
        echo "<td>" . $lugar['lugar'] . "</td>";
        echo "<td>" . $lugar['descripcion'] . "</td>";
        echo "<td><a href='listar_borrar.php?ip=".$lugar['ip']."'><img src='../img/borrar.png'></a></td>";
        echo "<td><a href='listar_modificar.php?ip=".$lugar['ip']."'><img src='../img/modificar.png'></a></td>";
        echo "</tr>";
    }
    echo "</table>";
    imprimirPie("Listar Lugar");
?>
