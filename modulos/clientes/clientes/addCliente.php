<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_clientes.php");

$nombre          = $_GET['nombre'];
$nif             = $_GET['nif'];
$formapago       = $_GET['formapago'];
$direccion       = $_GET['direccion'];
$localidad       = $_GET['localidad'];
$cp              = $_GET['cp'];
$provincia       = $_GET['provincia'];
$telefono        = $_GET['telefono'];
$fax             = $_GET['fax'];
$movil           = $_GET['movil'];
$cuentacorriente = $_GET['cuentacorriente'];
$web             = $_GET['web'];
$email           = $_GET['email'];
$descuento       = $_GET['descuento'];
$irpf            = $_GET['irpf'];
$observaciones   = $_GET['observaciones'];

addCliente($nombre, $nif, $formapago, $direccion, $localidad, $cp, $provincia, $telefono, $fax, $movil, $cuentacorriente, $web, $email, $descuento, $irpf, $observaciones);

?>