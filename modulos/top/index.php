<a href="./"><img src="img/logo.png" id="logoHome" /></a>

<div id="topMensaje" class="topData">Bienvenido <b><?php echo $_SESSION['bs_user']; ?> · <a href="?unlogin=ok" id="unlogin">Desconectarse</a></b></div>

<div id="menu" class="topMenu">
    <div id="menuBorder" class="subBorder"></div>
    
    <ul id="menuOpt">
        <li id="articulos" class="articulos"></li>
        <li id="clientes" class="clientes"></li>
        <li id="proveedores" class="proveedores"></li>
        <li id="facturacion" class="facturacion"></li>
        <li id="estadisticas" class="estadisticas"></li>
        <li id="utilidades" class="utilidades"></li>
    </ul>
    
    <div id="topSubMenu" class="topSubMainMenu">
        <div id="optArticulos" class="optSubMenu">
            <a class="subOpt" href="?opt=A_Familias">Familias</a>
            <a class="subOpt" href="?opt=A_Articulos">Articulos</a>
        </div>
        
        <div id="optClientes" class="optSubMenu">
            <a class="subOpt" href="?opt=C_Clientes">Clientes</a>
            <a class="subOpt" href="?opt=C_EnviarMail">Enviar Email</a>
            <a class="subOpt" href="?opt=C_FormasPago">Formas de Pago</a>
            <a class="subOpt" href="?opt=C_Provincias">Provincias</a>
        </div>
        
        <div id="optProveedores" class="optSubMenu">
            <a class="subOpt" href="?opt=P_Proveedores">Proveedores</a>
            <a class="subOpt" href="?opt=P_PreciosProveedores">Precios Proveedores</a>
            <a class="subOpt" href="?opt=P_FacturasProveedores">Facturas de Proveedores</a>
        </div>
        
        <div id="optFacturacion" class="optSubMenu">
            <a class="subOpt" href="?opt=F_Partes">Partes</a>
            <a class="subOpt" href="?opt=F_Albaranes">Albaranes</a>
            <a class="subOpt" href="?opt=F_Facturas">Facturas</a>
            <a class="subOpt" href="?opt=F_Presupuestos">Presupuestos</a>
        </div>
        
        <div id="optEstadisticas" class="optSubMenu">
            <a class="subOpt" href="?opt=E_Clientes">Clientes</a>
            <a class="subOpt" href="?opt=E_Articulos">Articulos</a>
            <a class="subOpt" href="?opt=E_ResumenFacturacion">Resumen Facturacion</a>
            <a class="subOpt" href="?opt=E_ModelosHacienda">Modelos Hacienda</a>
        </div>
        
        <div id="optUtilidades" class="optSubMenu">
            <a class="subOpt" href="?opt=U_CopiaSeguridad">Copia de Seguridad</a>
            <a class="subOpt" href="?opt=U_Limpieza">Limpieza</a>
            <a class="subOpt" href="?opt=U_Configuraciones">Configuraciones</a>
        </div>
    </div>
</div>