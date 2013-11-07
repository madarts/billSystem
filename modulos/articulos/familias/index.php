<?php
include("../cfg/connect.php");
include('../fnc/fnc_familias.php');
?>

<div id="Buscador" class="buscadorStl">
    <input type="text" id="txtBuscarFamilia" class="campoBuscador" onkeyup="searchFamilias(this);" />
    <img src="img/btnAddDatos.png" class="addDato" title="Añadir" onclick="openAddBox();" />
    
    <div id="campoAdd" class="stlAddBox">
        <img src="img/boxAddTop.png" />
            <div id="campoAddInt" class="intAddBox">
                <span>Nombre: <input type="text" id="txtAddNombre" name="txtAddNombre" size="36" /></span>
                    <div style="clear: both;"></div>
                <span>Mostrar en web: <select id="slcAddWeb" name="slcAddWeb">
                               <option value="si" selected="true">si</option>
                               <option value="no">no</option>
                           </select></span>
                    <div style="clear: both;"></div>
                    
                <img src="img/btnInsertar.png" class="btnInsertar" onclick="addFamilia();" />
            </div>
        <img src="img/boxAddBottom.png" />
        
        <img src="img/btnCancelar.png" class="btnClose" title="Cerrar" onclick="closeAddBox();" />
    </div>
</div>

<div id="TituloCategoria" class="separadorContenido">
    <span>FAMILIAS / SUBFAMILIAS</span>
    <img src="img/flechaInfSeparador.png" hspace="0" vspace="0" />
</div>


<div id="tablaDatos" class="contenidoTabla">
        <?php
        loadFamilias();
        ?>
</div>