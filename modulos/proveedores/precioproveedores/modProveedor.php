<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_proveedores.php");

$codigo          = $_GET['codigo'];

$nombre          = $_GET['nombre'];
$nif             = $_GET['nif'];
$direccion       = $_GET['direccion'];
$localidad       = $_GET['localidad'];
$cp              = $_GET['cp'];
$provincia       = $_GET['provincia'];
$telefono        = $_GET['telefono'];
$fax             = $_GET['fax'];
$movil           = $_GET['movil'];
$web             = $_GET['web'];
$email           = $_GET['email'];
$persona         = $_GET['persona'];
$cargo           = $_GET['cargo'];
$irpf            = $_GET['irpf'];
$observaciones   = $_GET['observaciones'];

modProveedor($codigo, $nombre, $nif, $direccion, $localidad, $cp, $provincia, $telefono, $fax, $movil, $web, $email, $persona, $cargo, $irpf, $observaciones);

?>