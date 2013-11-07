<?php

function loadPrecioproveedores($filter = ''){
    echo '<table id="camposTabla" class="tablaDatos" width="100%" cellpadding="0" cellspacing="1">
            <tr>
                <td class="stlTitleTabla" style="width: 200px;">Proveedor</td>
                <td class="stlTitleTabla" style="width: auto;" >Articulo</td>
                <td class="stlTitleTabla" style="width: 100px;">Precio</td>
            </tr>';

    $consulta = "SELECT * FROM artpro INNER JOIN proveedores ON artpro.idproveedor = proveedores.codproveedor 
    INNER JOIN articulos ON artpro.idarticulo = articulos.id
    WHERE nombre LIKE ('%". $filter ."%') OR descripcion LIKE ('%". $filter ."%')
    ORDER BY nombre, descripcion;";
    $stsql = mysql_query($consulta) or die(mysql_error());
    while ($row = mysql_fetch_assoc($stsql)){
        echo "<tr class='tablaCeldas1'>";
            echo "<td align='center'>" . $row['nombre'] ."</td>";
            echo "<td align='left'>" . $row['descripcion'] . "</td>";
            echo "<td align='center' style='background: #eee;'>" . $row['precio'] . "</td>";
        echo "</tr>";
    }

    echo '</table>';
}


function slcProvincia($filter=''){
    $consulta = "SELECT * FROM provincias ORDER BY denprovincia;";
    $stsql = mysql_query($consulta) or die(mysql_error());
    
    $return = '';
    while ($row = mysql_fetch_assoc($stsql)){
        if($filter == $row['codprovincia']) $return .= "<option value='". $row['codprovincia'] ."' selected='selected'>". $row['denprovincia'] ."</option>";
        else $return .= "<option value='". $row['codprovincia'] ."'>". $row['denprovincia'] ."</option>";
    }
    
    return $return;
}


function addproveedor($nombre, $nif, $direccion, $localidad, $cp, $provincia, $telefono, $fax, $movil, $web, $email, $persona, $cargo, $irpf, $observaciones){
    $queEmp = "SELECT * FROM proveedores WHERE nombre = '". $nombre ."';";
    $resEmp = mysql_query($queEmp) or die(mysql_error());
    $totEmp = mysql_num_rows($resEmp);
    
    if($totEmp == 0){
        $fechaAlta = date("Y-m-d");
        
        $queEmp = "INSERT INTO proveedores (nombre, nif, fechaalta, direccion, localidad, cp, codprovincia, telefono, fax, movil, web, email, persona, cargo, retencion, observaciones) 
                    VALUES 
                    ('". $nombre ."', '". $nif ."', '". $fechaAlta ."', '". $direccion ."', '". $localidad ."', '". $cp ."', '". $provincia ."', '". $telefono ."', '". $fax ."', '". $movil ."', '". $web ."', '". $email ."', '". $persona ."', '". $cargo ."', '". $irpf ."', '". $observaciones ."');";
        $resEmp = mysql_query($queEmp) or die(mysql_error());
    }
}


function searchProveedorInfo($codigo){
    $return = "<div id='boxMosProveedor' class='boxSubfamilia'><img src='img/boxAddTopSub.png' />";
        $return .= "<div class='intBoxSub' align='left'><img src='img/btnCancelar.png' class='btnClose' title='Cerrar' onclick='closeVerProveedor();' />";
        
        $queEmp = "SELECT * FROM proveedores WHERE codproveedor = '". $codigo ."';";
        $stsql = mysql_query($queEmp) or die(mysql_error());
        
        while ($row = mysql_fetch_assoc($stsql)){
            $queEmp2 = "SELECT * FROM provincias WHERE codprovincia = '". $row['codprovincia'] ."';";
            $stsql2 = mysql_query($queEmp2) or die(mysql_error());
            $provincia = '';
            while ($row2 = mysql_fetch_assoc($stsql2)){
                $provincia = $row2['denprovincia'];
            }
            
            $return .= '<span>Nombre: <span style="color: #fff; float: none;">'. $row['nombre'] .'</span></span>
                            <div style="clear: both;"></div>
                        <span>CIF/NIF: <span style="color: #fff; float: none;">'. $row['nif'] .'</span></span>
                            <div style="clear: both;"></div>
                        <span>Direccion: <span style="color: #fff; float: none;">'. $row['direccion'] .'</span></span>
                            <div style="clear: both;"></div>
                        <span>Localidad: <span style="color: #fff; float: none;">'. $row['localidad'] .'</span></span>
                            <div style="clear: both;"></div>
                        <span>Codigo postal: <span style="color: #fff; float: none;">'. $row['cp'] .'</span></span>
                            <div style="clear: both;"></div>
                        <span>Provincia: <span style="color: #fff; float: none;">'. $provincia .'</span></span>
                            <div style="clear: both;"></div>
                        <span>Telefono: <span style="color: #fff; float: none;">'. $row['telefono'] .'</span></span>
                            <div style="clear: both;"></div>
                        <span>Fax: <span style="color: #fff; float: none;">'. $row['fax'] .'</span></span>
                            <div style="clear: both;"></div>
                        <span>Movil: <span style="color: #fff; float: none;">'. $row['movil'] .'</span></span>
                            <div style="clear: both;"></div>
                        <span>Web: <span style="color: #fff; float: none;">'. $row['web'] .'</span></span>
                            <div style="clear: both;"></div>
                        <span>E-mail: <span style="color: #fff; float: none;">'. $row['email'] .'</span></span>
                            <div style="clear: both;"></div>
                        <span>Persona: <span style="color: #fff; float: none;">'. $row['persona'] .'</span></span>
                            <div style="clear: both;"></div>
                        <span>Cargo: <span style="color: #fff; float: none;">'. $row['cargo'] .'</span></span>
                            <div style="clear: both;"></div>
                        <span>Retenciones IRPF: <span style="color: #fff; float: none;">'. $row['retencion'] .'</span></span>
                            <div style="clear: both;"></div>
                        <span>Observaciones: <span style="color: #fff; float: none;">'. $row['observaciones'] .'</span></span>
                            <div style="clear: both;"></div>';
            
        }
        
        
        $return .= "<div>";
    $return .= "<img src='img/boxAddBottomSub.png' /></div>";
    
    echo $return;
}


function searchModificarProveedor($codigo){
    $return = "<div id='boxModProveedor' class='boxSubfamilia'><img src='img/boxAddTopSub.png' />";
        $return .= "<div class='intBoxSub' align='left'><img src='img/btnCancelar.png' class='btnClose' title='Cerrar' onclick='closeModProveedor();' />";
        
        $queEmp = "SELECT * FROM proveedores WHERE codproveedor = '". $codigo ."';";
        $stsql = mysql_query($queEmp) or die(mysql_error());
        
        while ($row = mysql_fetch_assoc($stsql)){
            $return .= '<span>Nombre: <input type="text" id="txtModNombreProveedor" name="txtModNombreProveedor" value="'. $row['nombre'] .'" size=30 /></span>
                            <div style="clear: both;"></div>
                        <span>CIF/NIF: <input type="text" id="txtModNifProveedor" name="txtModNifProveedor" value="'. $row['nif'] .'" size=10 /></span>
                            <div style="clear: both;"></div>
                        <span>Direccion: <input type="text" id="txtModDireccionProveedor" name="txtModDireccionProveedor" value="'. $row['direccion'] .'" size=42 /></span>
                            <div style="clear: both;"></div>
                        <span>Localidad: <input type="text" id="txtModLocalidadProveedor" name="txtModLocalidadProveedor" value="'. $row['localidad'] .'" size=20 /></span>
                            <div style="clear: both;"></div>
                        <span>Codigo postal: <input type="text" id="txtModCPProveedor" name="txtModCPProveedor" value="'. $row['cp'] .'" size=5 /></span>
                            <div style="clear: both;"></div>
                        <span>Provincia: <select name="slcModProvinciaProveedor" id="slcModProvinciaProveedor">'. 
                                             slcProvincia($row['codprovincia']) 
                                         .'</select></span>
                            <div style="clear: both;"></div>
                        <span>Telefono: <input type="text" id="txtModTelefonoProveedor" name="txtModTelefonoProveedor" value="'. $row['telefono'] .'" size=10 /></span>
                            <div style="clear: both;"></div>
                        <span>Fax: <input type="text" id="txtModFaxProveedor" name="txtModFaxProveedor" value="'. $row['fax'] .'" size=10 /></span>
                            <div style="clear: both;"></div>
                        <span>Movil: <input type="text" id="txtModMovilProveedor" name="txtModMovilProveedor" value="'. $row['movil'] .'" size=10 /></span>
                            <div style="clear: both;"></div>
                        <span>Web: <input type="text" id="txtModWebProveedor" name="txtModWebProveedor" value="'. $row['web'] .'" size=25 /></span>
                            <div style="clear: both;"></div>
                        <span>E-mail: <input type="text" id="txtModEmailproveedor" name="txtModEmailproveedor" value="'. $row['email'] .'" size=30 /></span>
                            <div style="clear: both;"></div>
                        <span>Persona: <input type="text" id="txtModPersonaProveedor" name="txtModPersonaProveedor" value="'. $row['persona'] .'" size=35 /></span>
                            <div style="clear: both;"></div>
                        <span>Cargo: <input type="text" id="txtModCargoProveedor" name="txtModCargoProveedor" value="'. $row['cargo'] .'" size=15 /></span>
                            <div style="clear: both;"></div>
                        <span>Retenciones IRPF: <input type="text" id="txtModIRPFProveedor" name="txtModIRPFProveedor" value="'. $row['retencion'] .'" size=4 /></span>
                            <div style="clear: both;"></div>
                        <span>Observaciones: <input type="text" id="txtModObservacionesProveedor" name="txtModObservacionesProveedor" value="'. $row['observaciones'] .'" size=38 /></span>
                            <div style="clear: both;"></div>
                            
                        
                        <img src="img/btnInsertar.png" class="btnInsertar" onclick="modProveedor('. $row['codproveedor'] .');" />';
            
        }
        
        
        $return .= "<div>";
    $return .= "<img src='img/boxAddBottomSub.png' /></div>";
    
    echo $return;
}

function modProveedor($codigo, $nombre, $nif, $direccion, $localidad, $cp, $provincia, $telefono, $fax, $movil, $web, $email, $persona, $cargo, $irpf, $observaciones){
    $queEmp = "UPDATE proveedores SET nombre = '". $nombre ."', nif = '". $nif ."', direccion = '". $direccion ."', localidad = '". $localidad ."', cp = '". $cp ."', codprovincia = '". $provincia ."', telefono = '". $telefono ."', fax = '". $fax ."', movil = '". $movil ."', web = '". $web ."', email = '". $email ."', persona = '". $persona ."', cargo = '". $cargo ."', retencion = '". $irpf ."', observaciones = '". $observaciones ."' WHERE codproveedor = '". $codigo ."';";
    $resEmp = mysql_query($queEmp) or die(mysql_error());
}


function delProveedor($codigo){
    $queEmp = "DELETE FROM proveedores WHERE codproveedor = '". $codigo ."';";
    $resEmp = mysql_query($queEmp) or die(mysql_error());
}



?>