<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_familias.php");

$codigo = $_GET['codigo'];

$nombre = $_GET['nombre'];
$web = $_GET['web'];
$beneficios = $_GET['beneficios'];

addSubFamilia($codigo, $nombre, $web, $beneficios);

?>