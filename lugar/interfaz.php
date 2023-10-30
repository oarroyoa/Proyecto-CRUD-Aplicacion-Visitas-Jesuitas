<?php
function imprimirCabecera($titulo)
{
    echo "<!DOCTYPE html>
<!-- Óscar Arroyo Aguadero -->
<html lang='es'>
<head>
    <link rel='stylesheet' type='text/css' href='../style/styles.css'>
    <title>".$titulo."</title>
</head>
<body>
<h1>".$titulo."</h1>";
}
function imprimirPie($titulo)
{
    if ($titulo=='Agregar Lugar'){
        echo "<br>
<a href='../index.html'>Menú</a><br>
<a href='eliminar_lugar.php'>Eliminar Lugar</a><br>
<a href='listar_lugar.php'>Listar Lugar</a><br>
<a href='listar_lugar_tabla.php'>Listar Lugar - Modificado y Borrado incluido</a><br>
<a href='modificar_lugar.php'>Modificar Lugar</a>
</body>
</html>";
    }
    if ($titulo=='Listar Lugar'){
        echo "<br>
<a href='../index.html'>Menú</a><br>
<a href='agregar_lugar.php'>Agregar Lugar</a><br>
<a href='modificar_lugar.php'>Modificar Lugar</a><br>
<a href='eliminar_lugar.php'>Eliminar Lugar</a>
</body>
</html>";
    }
    if ($titulo=='Modificar Lugar'){
        echo "<br>
<a href='../index.html'>Menú</a><br>
<a href='agregar_lugar.php'>Agregar Lugar</a><br>
<a href='listar_lugar.php'>Listar Lugar</a><br>
<a href='listar_lugar_tabla.php'>Listar Lugar - Modificado y Borrado incluido</a><br>
<a href='eliminar_lugar.php'>Eliminar Lugar</a>
</body>
</html>";
    }
    if ($titulo=='Eliminar Lugar'){
        echo "<br>
<a href='../index.html'>Menú</a><br>
<a href='agregar_jesuita.php'>Agregar Lugar</a><br>
<a href='listar_jesuita.php'>Listar Lugar</a><br>
<a href='listar_lugar_tabla.php'>Listar Lugar - Modificado y Borrado incluido</a><br>
<a href='modificar_jesuita.php'>Modificar Lugar</a>
</body>
</html>";
    }

}
