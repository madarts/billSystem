<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_provincias.php");

$codigo = $_GET['codigo'];

searchModificarProvincias($codigo);

?>