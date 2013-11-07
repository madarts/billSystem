<?php
include("../cfg/connect.php");
include('../fnc/fnc_proveedores.php');
?>

<div id="Buscador" class="buscadorStl">
    <input type="text" id="txtBuscarProveedor" class="campoBuscador" onkeyup="searchProveedores(this.value);" />
    <img src="img/btnAddDatos.png" class="addDato" title="Añadir" onclick="openAddBox();" />
    
    <div id="campoAdd" class="stlAddBox">
        <img src="img/boxAddTop.png" />
            <div id="campoAddInt" class="intAddBox">
                <span>Nombre: <input type="text" id="txtAddNombreProveedor" name="txtAddNombreProveedor" size="33" /></span>
                    <div style="clear: both;"></div>
                <span>CIF/NIF: <input type="text" id="txtAddNifProveedor" name="txtAddNifProveedor" size="10" /></span>
                    <div style="clear: both;"></div>
                <span>Direccion: <input type="text" id="txtAddDireccionProveedor" name="txtAddDireccionProveedor" size="35" /></span>
                    <div style="clear: both;"></div>
                <span>Localidad: <input type="text" id="txtAddLocalidadProveedor" name="txtAddLocalidadProveedor" size="25" /></span>
                    <div style="clear: both;"></div>
                <span>Codigo postal: <input type="text" id="txtAddCPProveedor" name="txtAddCPProveedor" size="6" /></span>
                    <div style="clear: both;"></div>
                <span>Provincia: <select id="slcAddProvinciaProveedor" name="slcAddProvinciaProveedor">
                                        <?php echo slcProvincia(); ?>
                                     </select></span>
                    <div style="clear: both;"></div>
                <span>Telefono: <input type="text" id="txtAddTelefonoProveedor" name="txtAddTelefonoProveedor" size="10" /></span>
                    <div style="clear: both;"></div>
                <span>Fax: <input type="text" id="txtAddFaxProveedor" name="txtAddFaxProveedor" size="10" /></span>
                    <div style="clear: both;"></div>
                <span>Movil: <input type="text" id="txtAddMovilProveedor" name="txtAddMovilProveedor" size="10" /></span>
                    <div style="clear: both;"></div>
                <span>Web: <input type="text" id="txtAddWebProveedor" name="txtAddWebProveedor" size="25" /></span>
                    <div style="clear: both;"></div>
                <span>E-mail: <input type="text" id="txtAddEmailProveedor" name="txtAddEmailProveedor" size="30" /></span>
                    <div style="clear: both;"></div>
                <span>Persona: <input type="text" id="txtAddPersonaProveedor" name="txtAddPersonaProveedor" size="30" /></span>
                    <div style="clear: both;"></div>
                <span>Cargo: <input type="text" id="txtAddCargoProveedor" name="txtAddCargoProveedor" size="15" /></span>
                    <div style="clear: both;"></div>
                <span>Retenciones IRPF: <input type="text" id="txtAddIRPFProveedor" name="txtAddIRPFProveedor" size="4" /></span>
                    <div style="clear: both;"></div>
                <span>Observaciones: <input type="text" id="txtAddObservacionesProveedor" name="txtAddObservacionesProveedor" size="35" /></span>
                    <div style="clear: both;"></div>
                    
                <img src="img/btnInsertar.png" class="btnInsertar" onclick="addProveedor();" />
            </div>
        <img src="img/boxAddBottom.png" />
        
        <img src="img/btnCancelar.png" class="btnClose" title="Cerrar" onclick="closeAddBox();" />
    </div>
    
    
</div>

<div id="TituloCategoria" class="separadorContenido">
    <span>PROVEEDORES</span>
    <img src="img/flechaInfSeparador.png" hspace="0" vspace="0" />
</div>


<div id="tablaDatos" class="contenidoTabla">
        <?php
        loadProveedores();
        ?>
</div>