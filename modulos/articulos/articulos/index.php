<?php
include("../cfg/connect.php");
include('../fnc/fnc_articulos.php');
?>

<div id="Buscador" class="buscadorStl">
    <input type="text" id="txtBuscarFamilia" class="campoBuscador" onkeyup="searchArticulos(this);" />
    <img src="img/btnAddDatos.png" class="addDato" title="Añadir" onclick="openAddBox();" />
    
    <div id="campoAdd" class="stlAddBox">
        <img src="img/boxAddTop.png" />
            <div id="campoAddInt" class="intAddBox">
                <span>Proveedor: <select id="slcAddProveedorArt" name="slcAddProveedorArt">
                                    <?php slcProveedores(); ?> 
                                 </select></span>
                    <div style="clear: both;"></div>
                <span>Precio proveedor: <input type="text" id="txtAddPrecioProveedorArt" name="txtAddPrecioProveedorArt" size="6" /></span>
                    <div style="clear: both;"><br /></div>
                <span>Familia: <select id="slcAddFamiliaArt" name="slcAddFamiliaArt" onchange="searchFamilia(this);">
                                   <?php slcFamilias(); ?> 
                               </select></span>
                    <div style="clear: both;"></div>
                <span>Subfamilia: <span style="float:  none; margin: 0;" id="slcSubFamilia"><select id="slcAddSubFamiliaArt" name="slcAddSubFamiliaArt">
                               </select></span></span>
                    <div style="clear: both;"></div>
                <span>Descripcion: <input type="text" id="txtAddDescripcionArt" name="txtAddDescripcionArt" size="35" /></span>
                    <div style="clear: both;"></div>
                <span>Detalles: <input type="text" id="txtAddDetallesArt" name="txtAddDetallesArt" size="35" /></span>
                    <div style="clear: both;"></div>
                <span>Precio en tienda: <input type="text" id="txtAddPrecioTiendaArt" name="txtAddPrecioTiendaArt" /></span>
                    <div style="clear: both;"></div>
                <span>Stock: <input type="text" id="txtAddStockArt" name="txtAddStockArt" size="6" /></span>
                    <div style="clear: both;"></div>
                <span>Bajo minimo: <input type="text" id="txtAddBajoMinimoArt" name="txtAddBajoMinimoArt" size="6" /></span>
                    <div style="clear: both;"></div>
                <span>Mostrar en web: <select id="slcAddMostrarWebArt" name="slcAddMostrarWebArt">
                                          <option value="si">Si</option>
                                          <option value="no">No</option>
                                      </select></span>
                    <div style="clear: both;"></div>
                <span>Oferta: <select id="slcAddOfertaArt" name="slcAddOfertaArt">
                                 <option value="si">Si</option>
                                 <option value="no">No</option>
                              </select></span>
                    <div style="clear: both;"></div>
                <span>Codigo de barras: <input type="text" id="txtAddCodigoBarrasArt" name="txtAddCodigoBarrasArt" size="14" /></span>
                    <div style="clear: both;"></div>
                <span>IVA: <input type="text" id="txtAddIvaArt" name="txtAddIvaArt" size="5" /></span>
                    <div style="clear: both;"></div>
                    
                <img src="img/btnInsertar.png" class="btnInsertar" onclick="addArticulo();" />
            </div>
        <img src="img/boxAddBottom.png" />
        
        <img src="img/btnCancelar.png" class="btnClose" title="Cerrar" onclick="closeAddBox();" />
    </div>
</div>

<div id="TituloCategoria" class="separadorContenido">
    <span>ARTICULOS</span>
    <img src="img/flechaInfSeparador.png" hspace="0" vspace="0" />
</div>


<div id="tablaDatos" class="contenidoTabla">
        <?php
        loadArticulos();
        ?>
</div>