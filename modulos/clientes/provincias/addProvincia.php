<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_provincias.php");

$provincia   = $_GET['provincia'];

addProvincia($provincia);

?>