<?php
include("../cfg/connect.php");
include('../fnc/fnc_clientes.php');
?>

<div id="Buscador" class="buscadorStl">
    <input type="text" id="txtBuscarClientes" class="campoBuscador" onkeyup="searchClientes(this.value);" />
    <img src="img/btnAddDatos.png" class="addDato" title="Añadir" onclick="openAddBox();" />
    
    <div id="campoAdd" class="stlAddBox">
        <img src="img/boxAddTop.png" />
            <div id="campoAddInt" class="intAddBox">
                <span>Nombre y Apellidos: <input type="text" id="txtAddNombreCliente" name="txtAddNombreCliente" size="33" /></span>
                    <div style="clear: both;"></div>
                <span>CIF/NIF: <input type="text" id="txtAddNifCliente" name="txtAddNifCliente" size="10" /></span>
                    <div style="clear: both;"></div>
                <span>Forma de pago: <select id="slcAddFormaPagoCliente" name="slcAddFormaPagoCliente">
                                        <?php echo slcFormasPago(); ?>
                                     </select></span>
                    <div style="clear: both;"></div>
                <span>Direccion: <input type="text" id="txtAddDireccionCliente" name="txtAddDireccionCliente" size="30" /></span>
                    <div style="clear: both;"></div>
                <span>Localidad: <input type="text" id="txtAddLocalidadCliente" name="txtAddLocalidadCliente" size="25" /></span>
                    <div style="clear: both;"></div>
                <span>Codigo postal: <input type="text" id="txtAddCPCliente" name="txtAddCPCliente" size="6" /></span>
                    <div style="clear: both;"></div>
                <span>Provincia: <select id="slcAddProvinciaCliente" name="slcAddProvinciaCliente">
                                        <?php echo slcProvincia(); ?>
                                     </select></span>
                    <div style="clear: both;"></div>
                <span>Telefono: <input type="text" id="txtAddTelefonoCliente" name="txtAddTelefonoCliente" size="10" /></span>
                    <div style="clear: both;"></div>
                <span>Fax: <input type="text" id="txtAddFaxCliente" name="txtAddFaxCliente" size="10" /></span>
                    <div style="clear: both;"></div>
                <span>Movil: <input type="text" id="txtAddMovilCliente" name="txtAddMovilCliente" size="10" /></span>
                    <div style="clear: both;"></div>
                <span>Cuenta corriente: <input type="text" id="txtAddCuentaCorrienteCliente" name="txtAddCuentaCorrienteCliente" size="26" /></span>
                    <div style="clear: both;"></div>
                <span>Web: <input type="text" id="txtAddWebCliente" name="txtAddWebCliente" size="25" /></span>
                    <div style="clear: both;"></div>
                <span>E-mail: <input type="text" id="txtAddEmailCliente" name="txtAddEmailCliente" size="30" /></span>
                    <div style="clear: both;"></div>
                <span>Descuento: <input type="text" id="txtAddDescuentoCliente" name="txtAddDescuentoCliente" size="4" /></span>
                    <div style="clear: both;"></div>
                <span>Retenciones IRPF: <input type="text" id="txtAddIRPFCliente" name="txtAddIRPFCliente" size="4" /></span>
                    <div style="clear: both;"></div>
                <span>Observaciones: <input type="text" id="txtAddObservacionesCliente" name="txtAddObservacionesCliente" size="35" /></span>
                    <div style="clear: both;"></div>
                    
                <img src="img/btnInsertar.png" class="btnInsertar" onclick="addCliente();" />
            </div>
        <img src="img/boxAddBottom.png" />
        
        <img src="img/btnCancelar.png" class="btnClose" title="Cerrar" onclick="closeAddBox();" />
    </div>
    
    
</div>

<div id="TituloCategoria" class="separadorContenido">
    <span>CLIENTES</span>
    <img src="img/flechaInfSeparador.png" hspace="0" vspace="0" />
</div>


<div id="tablaDatos" class="contenidoTabla">
        <?php
        loadClientes();
        ?>
</div>