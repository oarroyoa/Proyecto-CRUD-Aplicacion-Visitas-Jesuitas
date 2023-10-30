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
    if ($titulo=='Agregar Jesuita'){
        echo "<br>
<a href='../index.html'>Menú</a><br>
<a href='eliminar_jesuita.php'>Eliminar Jesuita</a><br>
<a href='listar_jesuita.php'>Listar Jesuita</a><br>
<a href='modificar_jesuita.php'>Modificar Jesuita</a>
</body>
</html>";
    }
    if ($titulo=='Listar Jesuita'){
        echo "<br>
<a href='../index.html'>Menú</a><br>
<a href='agregar_jesuita.php'>Agregar Jesuita</a><br>
<a href='modificar_jesuita.php'>Modificar Jesuita</a><br>
<a href='eliminar_jesuita.php'>Eliminar Jesuita</a>
</body>
</html>";
    }
    if ($titulo=='Modificar Jesuita'){
        echo "<br>
<a href='../index.html'>Menú</a><br>
<a href='agregar_jesuita.php'>Agregar Jesuita</a><br>
<a href='listar_jesuita.php'>Listar Jesuita</a><br>
<a href='eliminar_jesuita.php'>Eliminar Jesuita</a>
</body>
</html>";
    }
    if ($titulo=='Eliminar Jesuita'){
        echo "<br>
<a href='../index.html'>Menú</a><br>
<a href='agregar_jesuita.php'>Agregar Jesuita</a><br>
<a href='listar_jesuita.php'>Listar Jesuita</a><br>
<a href='modificar_jesuita.php'>Modificar Jesuita</a>
</body>
</html>";
    }

}
