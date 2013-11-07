<?php

$opcion = $_GET['optSelect'];

switch($opcion){
    case 'A_Familias': include('../modulos/articulos/familias/index.php'); break;
    case 'A_Articulos': include('../modulos/articulos/articulos/index.php'); break;
    
    case 'C_Clientes': include('../modulos/clientes/clientes/index.php'); break;
    case 'C_EnviarMail': echo "enviar email"; break;
    case 'C_FormasPago': include('../modulos/clientes/formapago/index.php'); break;
    case 'C_Provincias': include('../modulos/clientes/provincias/index.php'); break;
    
    case 'P_Proveedores': include('../modulos/proveedores/proveedores/index.php'); break;
    case 'P_PreciosProveedores': include('../modulos/proveedores/precioproveedores/index.php'); break;
    case 'P_FacturasProveedores': include('../modulos/proveedores/facturasproveedor/index.php'); break;
    
    case 'F_Partes': echo "partes"; break;
    case 'F_Albaranes': echo "albaranes"; break;
    case 'F_Facturas': echo "facturas"; break;
    case 'F_Presupuestos': echo "presupuestos"; break;
    
    case 'E_Clientes': echo "clientes"; break;
    case 'E_Articulos': echo "articulos"; break;
    case 'E_ResumenFacturacion': echo "resumen facturacion"; break;
    case 'E_ModelosHacienda': echo "modelos hacienda"; break;
    
    case 'U_CopiaSeguridad': echo "copia de seguridad"; break;
    case 'U_Limpieza': echo "limpieza"; break;
    case 'U_Configuraciones': echo "configuraciones"; break;
}

?>