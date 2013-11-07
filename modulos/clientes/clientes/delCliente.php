<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_clientes.php");

$codigo = $_GET['codCliente'];

delCliente($codigo);

?>