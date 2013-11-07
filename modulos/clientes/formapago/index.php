<?php
include("../cfg/connect.php");
include('../fnc/fnc_formapago.php');
?>

<div id="Buscador" class="buscadorStl">
    <img src="img/btnAddDatos.png" class="addDato" title="Añadir" onclick="openAddBox();" />
    
    <div id="campoAdd" class="stlAddBox">
        <img src="img/boxAddTop.png" />
            <div id="campoAddInt" class="intAddBox">
                <span>Denominacion: <input type="text" id="txtAddDenominacionFormapago" name="txtAddDenominacionFormapago" size="33" /></span>
                    <div style="clear: both;"></div>
                <span>Observacion: <input type="text" id="txtAddObservacionFormapago" name="txtAddObservacionFormapago" size="33" /></span>
                    <div style="clear: both;"></div>
                    
                <img src="img/btnInsertar.png" class="btnInsertar" onclick="addFormapago();" />
            </div>
        <img src="img/boxAddBottom.png" />
        
        <img src="img/btnCancelar.png" class="btnClose" title="Cerrar" onclick="closeAddBox();" />
    </div>
    
    
</div>

<div id="TituloCategoria" class="separadorContenido">
    <span>FORMAS DE PAGO</span>
    <img src="img/flechaInfSeparador.png" hspace="0" vspace="0" />
</div>


<div id="tablaDatos" class="contenidoTabla">
        <?php
        loadFormaspago();
        ?>
</div>