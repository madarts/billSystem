<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_proveedores.php");

$codigo = $_GET['codigo'];
$opt    = $_GET['opt'];


switch($opt){
    case 1: searchProveedorInfo($codigo); break;
    case 2: searchModificarProveedor($codigo); break;
}


?>