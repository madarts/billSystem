<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_articulos.php");

$codigo = $_GET['codigo'];

delArticulo($codigo);

?>