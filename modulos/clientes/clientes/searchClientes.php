<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_clientes.php");

$search = $_GET['search'];

loadClientes($search);

?>