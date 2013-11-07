<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_proveedores.php");

$codigo = $_GET['codigo'];

delProveedor($codigo);

?>