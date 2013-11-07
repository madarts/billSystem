<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_articulos.php");

$codFamilia = $_GET['codFamilia'];
$idSlc = $_GET['idSlc'];

searchSubFamilia($codFamilia, $idSlc);

?>