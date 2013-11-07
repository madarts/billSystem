<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_clientes.php");

$codigo = $_GET['codigo'];
$opt    = $_GET['opt'];


switch($opt){
    case 1: searchClienteInfo($codigo); break;
    case 2: searchModificarCliente($codigo); break;
}


?>