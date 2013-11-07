<?php

function loadClientes($filter = ''){
    echo '<table id="camposTabla" class="tablaDatos" width="100%" cellpadding="0" cellspacing="1">
            <tr>
                <td class="stlTitleTabla" style="width: 100px;">Codigo</td>
                <td class="stlTitleTabla" style="width: auto;" >Nombre</td>
                <td class="stlTitleTabla" style="width: 100px;">Nif/Cif</td>
                <td class="stlTitleTabla" style="width: 120px;">Localidad</td>
                <td class="stlTitleTabla" style="width: 120px;">Ver Ficha</td>
                <td class="stlTitleTabla" style="width: 120px;">Modificar</td>
                <td class="stlTitleTabla" style="width: 120px;">Eliminar</td>
            </tr>';

    $consulta = "SELECT * FROM clientes WHERE nombre LIKE ('%" . $filter .
        "%') OR nif LIKE ('%" . $filter . "%') OR localidad LIKE ('%" . $filter .
        "%') OR cp LIKE ('%" . $filter . "%') OR telefono LIKE ('%" . $filter .
        "%') OR fax LIKE ('%" . $filter . "%') OR movil LIKE ('%" . $filter .
        "%') OR email LIKE ('%" . $filter . "%') ORDER BY nombre;";
    $stsql = mysql_query($consulta) or die(mysql_error());
    $i = 0;
    while ($row = mysql_fetch_assoc($stsql)){
        $i++;

        echo "<tr class='tablaCeldas1'>";
            echo "<td align='center'><span style='color:blue;'>" . $row['codcliente'] ."</span></td>";
            echo "<td align='left'>" . $row['nombre'] . "</td>";
            echo "<td align='center'>" . $row['nif'] . "</td>";
            echo "<td align='center'>" . $row['localidad'] . "</td>";
    
            // BOTON VER CLIENTE
            echo "<td align='center' class='parteBox'>
                      <div style='position: relative;'>
                          <input type='button' id='btnVerCliente' name='btnVerCliente' class='btnInsFam' value='Ver ficha' onclick='openVerCliente(". $row['codcliente'] .", ". $i .")' />
                          <spam id='boxVerCliente_". $i ."'></spam>
                      </div>
                  </td>";
            // FIN BOTON VER CLIENTE
            
            // BOTON MODIFICAR CLIENTE
            echo "<td align='center' class='parteBox'>
                      <div style='position: relative;'>
                          <input type='button' id='btnModificarCliente' name='btnModificarCliente' class='btnInsFam' value='Modificar' onclick='openModificarCliente(". $row['codcliente'] .", ". $i .")' />
                          <spam id='boxModificarCliente_". $i ."'></spam>
                      </div>
                  </td>";
            // FIN BOTON MODIFICAR CLIENTE
    
            // BOTON ELIMINAR CLIENTE
            echo "<td align='center' class='parteBox'>
                <div style='position: relative;'>
                    <input type='button' id='btnEliminarCliente' name='btnEliminarCliente' class='btnInsFam' value='Eliminar' onclick='delClientes(". $row['codcliente'] .")' />";
            echo "</div>";
            echo "</td>";
            // FIN BOTON ELIMINAR CLIENTE


        echo "</tr>";
    }

    echo '</table>';
}


function slcFormasPago($filter=''){
    $consulta = "SELECT * FROM formapago ORDER BY denfp;";
    $stsql = mysql_query($consulta) or die(mysql_error());
    
    $return = '';
    while ($row = mysql_fetch_assoc($stsql)){
        if($filter == $row['codfp']) $return .= "<option value='". $row['codfp'] ."' selected='selected'>". $row['denfp'] ."</option>";
        else $return .= "<option value='". $row['codfp'] ."'>". $row['denfp'] ."</option>";
    }
    
    return $return;
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


function addCliente($nombre, $nif, $formapago, $direccion, $localidad, $cp, $provincia, $telefono, $fax, $movil, $cuentacorriente, $web, $email, $descuento, $irpf, $observaciones){
    $queEmp = "SELECT * FROM clientes WHERE nif = '". $nif ."';";
    $resEmp = mysql_query($queEmp) or die(mysql_error());
    $totEmp = mysql_num_rows($resEmp);
    
    if($totEmp == 0){
        $fechaAlta = date("Y-m-d");
        
        $queEmp = "INSERT INTO clientes (nombre, nif, fechaalta, direccion, localidad, cp, codprovincia, telefono, fax, movil, web, email, cuenta, descuento, retencion, observaciones, codfp) 
                    VALUES 
                    ('". $nombre ."', '". $nif ."', '". $fechaAlta ."', '". $direccion ."', '". $localidad ."', '". $cp ."', '". $provincia ."', '". $telefono ."', '". $fax ."', '". $movil ."', '". $web ."', '". $email ."', '". $cuentacorriente ."', '". $descuento ."', '". $irpf ."', '". $observaciones ."', '". $formapago ."');";
        $resEmp = mysql_query($queEmp) or die(mysql_error());
    }
}

function searchClienteInfo($codigo){
    $return = "<div id='boxMosCliente' class='boxSubfamilia'><img src='img/boxAddTopSub.png' />";
        $return .= "<div class='intBoxSub' align='left'><img src='img/btnCancelar.png' class='btnClose' title='Cerrar' onclick='closeVerClientes();' />";
        
        $queEmp = "SELECT * FROM clientes WHERE codcliente = '". $codigo ."';";
        $stsql = mysql_query($queEmp) or die(mysql_error());
        
        while ($row = mysql_fetch_assoc($stsql)){
            $queEmp2 = "SELECT * FROM formapago WHERE codfp = '". $row['codfp'] ."';";
            $stsql2 = mysql_query($queEmp2) or die(mysql_error());
            $formapago = '';
            while ($row2 = mysql_fetch_assoc($stsql2)){
                $formapago = $row2['denfp'];
            }
            
            $queEmp2 = "SELECT * FROM provincias WHERE codprovincia = '". $row['codprovincia'] ."';";
            $stsql2 = mysql_query($queEmp2) or die(mysql_error());
            $provincia = '';
            while ($row2 = mysql_fetch_assoc($stsql2)){
                $provincia = $row2['denprovincia'];
            }
            
            $return .= '<span>Nombre y Apellidos: <span style="color: #fff; float: none;">'. $row['nombre'] .'</span></span>
                            <div style="clear: both;"></div>
                        <span>CIF/NIF: <span style="color: #fff; float: none;">'. $row['nif'] .'</span></span>
                            <div style="clear: both;"></div>
                        <span>Forma de pago: <span style="color: #fff; float: none;">'. $formapago .'</span></span>
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
                        <span>Cuenta corriente: <span style="color: #fff; float: none;">'. $row['cuenta'] .'</span></span>
                            <div style="clear: both;"></div>
                        <span>Web: <span style="color: #fff; float: none;">'. $row['web'] .'</span></span>
                            <div style="clear: both;"></div>
                        <span>E-mail: <span style="color: #fff; float: none;">'. $row['email'] .'</span></span>
                            <div style="clear: both;"></div>
                        <span>Descuento: <span style="color: #fff; float: none;">'. $row['descuento'] .'</span></span>
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


function searchModificarCliente($codigo){
    $return = "<div id='boxModCliente' class='boxSubfamilia'><img src='img/boxAddTopSub.png' />";
        $return .= "<div class='intBoxSub' align='left'><img src='img/btnCancelar.png' class='btnClose' title='Cerrar' onclick='closeModClientes();' />";
        
        $queEmp = "SELECT * FROM clientes WHERE codcliente = '". $codigo ."';";
        $stsql = mysql_query($queEmp) or die(mysql_error());
        
        while ($row = mysql_fetch_assoc($stsql)){
            $return .= '<span>Nombre y Apellidos: <input type="text" id="txtModNombreCliente" name="txtModNombreCliente" value="'. $row['nombre'] .'" size=30 /></span>
                            <div style="clear: both;"></div>
                        <span>CIF/NIF: <input type="text" id="txtModNifCliente" name="txtModNifCliente" value="'. $row['nif'] .'" size=10 /></span>
                            <div style="clear: both;"></div>
                        <span>Forma de pago: <select name="slcModFormaPagoCliente" id="slcModFormaPagoCliente">'. 
                                                 slcFormasPago($row['codfp']) 
                                             .'</select></span>
                            <div style="clear: both;"></div>
                        <span>Direccion: <input type="text" id="txtModDireccionCliente" name="txtModDireccionCliente" value="'. $row['direccion'] .'" size=42 /></span>
                            <div style="clear: both;"></div>
                        <span>Localidad: <input type="text" id="txtModLocalidadCliente" name="txtModLocalidadCliente" value="'. $row['localidad'] .'" size=20 /></span>
                            <div style="clear: both;"></div>
                        <span>Codigo postal: <input type="text" id="txtModCPCliente" name="txtModCPCliente" value="'. $row['cp'] .'" size=5 /></span>
                            <div style="clear: both;"></div>
                        <span>Provincia: <select name="slcModProvinciaCliente" id="slcModProvinciaCliente">'. 
                                             slcProvincia($row['codprovincia']) 
                                         .'</select></span>
                            <div style="clear: both;"></div>
                        <span>Telefono: <input type="text" id="txtModTelefonoCliente" name="txtModTelefonoCliente" value="'. $row['telefono'] .'" size=10 /></span>
                            <div style="clear: both;"></div>
                        <span>Fax: <input type="text" id="txtModFaxCliente" name="txtModFaxCliente" value="'. $row['fax'] .'" size=10 /></span>
                            <div style="clear: both;"></div>
                        <span>Movil: <input type="text" id="txtModMovilCliente" name="txtModMovilCliente" value="'. $row['movil'] .'" size=10 /></span>
                            <div style="clear: both;"></div>
                        <span>Cuenta corriente: <input type="text" id="txtModCuentaCorrienteCliente" name="txtModCuentaCorrienteCliente" value="'. $row['cuenta'] .'" size=27 /></span>
                            <div style="clear: both;"></div>
                        <span>Web: <input type="text" id="txtModWebCliente" name="txtModWebCliente" value="'. $row['web'] .'" size=25 /></span>
                            <div style="clear: both;"></div>
                        <span>E-mail: <input type="text" id="txtModEmailCliente" name="txtModEmailCliente" value="'. $row['email'] .'" size=30 /></span>
                            <div style="clear: both;"></div>
                        <span>Descuento: <input type="text" id="txtModDescuentoCliente" name="txtModDescuentoCliente" value="'. $row['descuento'] .'" size=4 /></span>
                            <div style="clear: both;"></div>
                        <span>Retenciones IRPF: <input type="text" id="txtModIRPFCliente" name="txtModIRPFCliente" value="'. $row['retencion'] .'" size=4 /></span>
                            <div style="clear: both;"></div>
                        <span>Observaciones: <input type="text" id="txtModObservacionesCliente" name="txtModObservacionesCliente" value="'. $row['observaciones'] .'" size=38 /></span>
                            <div style="clear: both;"></div>
                            
                        
                        <img src="img/btnInsertar.png" class="btnInsertar" onclick="modCliente('. $row['codcliente'] .');" />';
            
        }
        
        
        $return .= "<div>";
    $return .= "<img src='img/boxAddBottomSub.png' /></div>";
    
    echo $return;
}

function modCliente($codigo, $nombre, $nif, $formapago, $direccion, $localidad, $cp, $provincia, $telefono, $fax, $movil, $cuentacorriente, $web, $email, $descuento, $irpf, $observaciones){
    $queEmp = "UPDATE clientes SET nombre = '". $nombre ."', nif = '". $nif ."', codfp = '". $formapago ."', direccion = '". $direccion ."', localidad = '". $localidad ."', cp = '". $cp ."', codprovincia = '". $provincia ."', telefono = '". $telefono ."', fax = '". $fax ."', movil = '". $movil ."', cuenta = '". $cuentacorriente ."', web = '". $web ."', email = '". $email ."', descuento = '". $descuento ."', retencion = '". $irpf ."', observaciones = '". $observaciones ."' WHERE codcliente = '". $codigo ."';";
    $resEmp = mysql_query($queEmp) or die(mysql_error());
}


function delCliente($codigo){
    $queEmp = "DELETE FROM clientes WHERE codcliente = '". $codigo ."';";
    $resEmp = mysql_query($queEmp) or die(mysql_error());
}



?>