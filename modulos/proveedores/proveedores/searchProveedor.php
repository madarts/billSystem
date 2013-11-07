<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_proveedores.php");

$search = $_GET['search'];

loadProveedores($search);

?>