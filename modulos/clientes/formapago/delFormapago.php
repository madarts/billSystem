<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_formapago.php");

$codigo = $_GET['codFormapago'];

delFormapago($codigo);

?>