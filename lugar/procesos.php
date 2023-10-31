<?php
$ip=$_GET['ip'];
$proceso = $_GET['proceso'];
if ($_GET['proceso'] == 'borrar'){
    header("location:listar_borrar.php?ip=$ip");
}

if ($_GET['proceso'] == 'modificar') {
    header("location:listar_modificar.php?ip=$ip");
}
?>
