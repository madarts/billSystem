<?php
include("../../../cfg/connect.php");
include("../../../fnc/fnc_articulos.php");

$id = $_GET['id'];

$proveedor       = $_GET['proveedor'];
$pvpProveedor    = $_GET['pvpProveedor'];

$familia         = $_GET['familia'];
$subFamilia      = $_GET['subFamilia'];
$descripcion     = $_GET['descripcion'];
$detalles        = $_GET['detalles'];
$pvp             = $_GET['pvp'];
$stock           = $_GET['stock'];
$bajoMinimo      = $_GET['bajoMinimo'];
$mostrWeb        = $_GET['mostrWeb'];
$oferta          = $_GET['oferta'];
$codBarras       = $_GET['codBarras'];
$iva             = $_GET['iva'];

modArticulo($id, $proveedor, $pvpProveedor, $familia, $subFamilia, $descripcion, $detalles, $pvp, $stock, $bajoMinimo, $mostrWeb, $oferta, $codBarras, $iva);

?>