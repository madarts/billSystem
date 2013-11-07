<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_formapago.php");

$denominacion   = $_GET['denominacion'];
$observacion    = $_GET['observacion'];

addFormapago($denominacion, $observacion);

?>