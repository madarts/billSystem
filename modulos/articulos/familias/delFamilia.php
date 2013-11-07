<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_familias.php");

$codigo = $_GET['codigo'];

delFamilia($codigo);

?>