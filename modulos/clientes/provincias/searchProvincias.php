<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_provincias.php");

$search = $_GET['search'];

loadProvincias($search);

?>