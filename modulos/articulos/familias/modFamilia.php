<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_familias.php");

$id = $_GET['id'];

$nombre = $_GET['nombre'];
$web = $_GET['web'];

modFamilia($id, $nombre, $web);

?>