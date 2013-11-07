<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_familias.php");

$nombre = $_GET['nombre'];
$web = $_GET['web'];

addFamilia($nombre, $web);

?>