<?php
    include('interfaz.php');
    imprimirCabecera("Listar Lugar");
    require_once('LugarCRUD.php');
    echo "<table>
           <tr>
               <th>IP</th>
               <th>Lugar</th>
               <th>Descripción</th>
               <th>Borrar</th>
               <th>Modificar</th>
           </tr>";
    $crud = new LugarCRUD();
    $lugares = $crud->obtenerLugares();
    $borrar = 'borrar';
    $modificar = 'modificar';
    foreach ($lugares as $lugar) {
        echo "<tr>";
        echo "<td>" . $lugar['ip'] . "</td>";
        echo "<td>" . $lugar['lugar'] . "</td>";
        echo "<td>" . $lugar['descripcion'] . "</td>";
        echo "<td><a href='procesos.php?ip=".$lugar['ip']."&proceso=borrar'><img src='../img/borrar.png'></a></td>";
        echo "<td><a href='procesos.php?ip=".$lugar['ip']."&proceso=modificar'><img src='../img/modificar.png'></a></td>";
        echo "</tr>";
    }
    echo "</table>";
    imprimirPie("Listar Lugar");
?>
