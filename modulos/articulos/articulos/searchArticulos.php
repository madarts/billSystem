<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_articulos.php");

$search = $_GET['search'];

loadArticulos($search);

?>