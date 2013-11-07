<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_provincias.php");

$codigo         = $_GET['codigo'];

$provincia   = $_GET['provincia'];

modProvincias($codigo, $provincia);

?>