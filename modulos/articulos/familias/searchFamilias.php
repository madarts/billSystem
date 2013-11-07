<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_familias.php");

$search = $_GET['search'];

loadFamilias($search);

?>