<?php
include("../cfg/connect.php");
include('../fnc/fnc_precioproveedores.php');
?>

<div id="Buscador" class="buscadorStl">
    <input type="text" id="txtBuscarPrecioproveedor" class="campoBuscador" onkeyup="searchPrecioproveedores(this.value);" />
</div>

<div id="TituloCategoria" class="separadorContenido">
    <span>PRECIO PROVEEDORES</span>
    <img src="img/flechaInfSeparador.png" hspace="0" vspace="0" />
</div>


<div id="tablaDatos" class="contenidoTabla">
        <?php
        loadPrecioproveedores();
        ?>
</div>