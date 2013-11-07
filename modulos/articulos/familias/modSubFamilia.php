<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_familias.php");

$id = $_GET['id'];

$nombre = $_GET['nombre'];
$web = $_GET['web'];
$beneficios = $_GET['beneficios'];

modSubFamilia($id, $nombre, $web, $beneficios);

?>