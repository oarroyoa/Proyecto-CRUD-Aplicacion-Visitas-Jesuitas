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
    echo "</tr>";
}
echo "</table>";
imprimirPie("Listar Lugar");
?>
