<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_formapago.php");

$search = $_GET['search'];

loadFormaspago($search);

?>