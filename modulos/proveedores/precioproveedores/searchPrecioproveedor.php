<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_precioproveedores.php");

$search = $_GET['search'];

loadPrecioproveedores($search);

?>