<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_formapago.php");

$codigo         = $_GET['codigo'];

$denominacion   = $_GET['denominacion'];
$observacion    = $_GET['observacion'];

modFormapago($codigo, $denominacion, $observacion);

?>