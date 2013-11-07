<?php

function slcProveedores($id=0){
    $consulta = "SELECT * FROM proveedores ORDER BY nombre;";
    $stsql = mysql_query($consulta) or die(mysql_error());
    while ($row = mysql_fetch_assoc($stsql)) {
        if($id == $row['codproveedor']) echo "<option value='". $row['codproveedor'] ."' selected='selected'>". $row['nombre'] ."</option>";
        else echo "<option value='". $row['codproveedor'] ."'>". $row['nombre'] ."</option>";
    }
}

function slcFamilias($id=0){
    $consulta = "SELECT * FROM familia ORDER BY familia;";
    $stsql = mysql_query($consulta) or die(mysql_error());
    while ($row = mysql_fetch_assoc($stsql)) {
        if($id == $row['codigo']) echo "<option value='". $row['codigo'] ."' selected='selected'>". $row['familia'] ."</option>";
        else echo "<option value='". $row['codigo'] ."'>". $row['familia'] ."</option>";
    }
}

function loadArticulos($filter=''){
    echo '<table id="camposTabla" class="tablaDatos" width="100%" cellpadding="0" cellspacing="1">
            <tr>
                <td class="stlTitleTabla" style="width: auto;">Articulo</td>
                <td class="stlTitleTabla" style="width: 100px;">Pvp</td>
                <td class="stlTitleTabla" style="width: 120px;">Mostrar</td>
                <td class="stlTitleTabla" style="width: 120px;">Modificar</td>
                <td class="stlTitleTabla" style="width: 120px;">Eliminar</td>
            </tr>';
        
    $consulta = "SELECT * FROM articulos WHERE descripcion LIKE ('%". $filter ."%') ORDER BY descripcion;";
    $stsql = mysql_query($consulta) or die(mysql_error());
    $i=0;
    $e=0;
    while ($row = mysql_fetch_assoc($stsql)) {
        $i++;
        
        $idProveedor      = '';
        $pvpProveedor   = '';
        $familia        = '';
        $subfamilia     = '';
        
        $consulta2 = "SELECT * FROM artpro WHERE idarticulo = '". $row['id'] ."';";
        $stsql2 = mysql_query($consulta2) or die(mysql_error());
        while ($row2 = mysql_fetch_assoc($stsql2)) {
            $consulta3 = "SELECT * FROM proveedores WHERE codproveedor = '". $row2['idproveedor'] ."';";
            $stsql3 = mysql_query($consulta3) or die(mysql_error());
            while ($row3 = mysql_fetch_assoc($stsql3)) {
                $idProveedor = $row3['codproveedor'];
            }
            
            $pvpProveedor = $row2['precio'];
        }
        
        $consulta2 = "SELECT * FROM familia WHERE codigo = '". $row['codfamilia'] ."';";
        $stsql2 = mysql_query($consulta2) or die(mysql_error());
        while ($row2 = mysql_fetch_assoc($stsql2)) {
            $familia = $row2['familia'];
        }
        
        $consulta2 = "SELECT * FROM subfamilia WHERE idfamilia = '". $row['codfamilia'] ."' AND  codigo = '". $row['codsubfamilia'] ."';";
        $stsql2 = mysql_query($consulta2) or die(mysql_error());
        while ($row2 = mysql_fetch_assoc($stsql2)) {
            $subfamilia = $row2['subfamilia'];
        }
        
        echo "<tr class='tablaCeldas1'>";
            echo "<td><span style='color:red;'>". $row['codigo'] ."</span> - ". $row['descripcion'] ."</td>";
            echo "<td align='center'>". $row['pvp'] ."</td>";
            echo "<td align='center' class='parteBox'><div style='position: relative;'><input type='button' id='btnMostrarArt' name='btnMostrarArt' class='btnInsFam' value='Mostrar' onclick='openMostArt(". $i .")' />";
                    echo "<div id='boxMostArt_". $i ."' class='boxSubfamilia'><img src='img/boxAddTopSub.png' />";
                        echo "<div class='intBoxSub' align='left'><img src='img/btnCancelar.png' class='btnClose' title='Cerrar' onclick='closeMostArt(". $i .");'  />";
                        ?>
                        <span>Familia: <span style="font-weight: normal; float:  none; background: #fff;"><?php echo $familia; ?>&nbsp;</span></span>
                            <div style="clear: both;"></div>
                        <span>Subfamilia: <span style="font-weight: normal; float:  none; background: #fff;"><?php echo $subfamilia; ?>&nbsp;</span></span>
                            <div style="clear: both;"></div>
                        <span>Codigo de barras: <span style="font-weight: normal; float:  none; background: #fff;"><?php echo trim($row['codbarras']); ?>&nbsp;</span></span>
                            <div style="clear: both;"></div>
                        <span>Descripcion: <span style="font-weight: normal; float:  none; background: #fff;"><?php echo trim($row['descripcion']); ?>&nbsp;</span></span>
                            <div style="clear: both;"></div>
                        <span>Detalles: <span style="font-weight: normal; float:  none; background: #fff;"><?php echo trim($row['detalles']); ?>&nbsp;</span></span>
                            <div style="clear: both;"></div>
                        <span>Stock: <span style="font-weight: normal; float:  none; background: #fff;"><?php echo trim($row['stock']); ?> Unidades</span></span>
                            <div style="clear: both;"></div>
                        <span>Bajo minimo: <span style="font-weight: normal; float:  none; background: #fff;"><?php echo trim($row['bajominimo']); ?> Unidades</span></span>
                            <div style="clear: both;"></div>
                        <span>Precio en tienda: <span style="font-weight: normal; float:  none; background: #fff;"><?php echo trim($row['pvp']); ?> &#8364;</span></span>
                            <div style="clear: both;"></div>
                        <span>Mostrar en web: <span style="font-weight: normal; float:  none; background: #fff;"><?php echo trim($row['mostrweb']); ?>&nbsp;</span></span>
                            <div style="clear: both;"></div>
                        <span>Oferta: <span style="font-weight: normal; float:  none; background: #fff;"><?php echo trim($row['oferta']); ?>&nbsp;</span></span>
                            <div style="clear: both;"></div>
                            
                        <?php
                        echo "</div>";
                    echo "<img src='img/boxAddBottomSub.png' /></div>";
                echo "</div></td>";
            echo "<td align='center' class='parteBox'><div style='position: relative;'><input type='button' id='btnModificarArt' name='btnModificarArt' class='btnModFam' value='Modificar' onclick='openModArtBox(". $i .")' />";
                    echo "<div id='boxModArt_". $i ."' class='boxSubfamilia'><img src='img/boxAddTopSub.png' />";
                        echo "<div class='intBoxSub' align='left'><img src='img/btnCancelar.png' class='btnClose' title='Cerrar' onclick='closeModArtBox(". $i .");'  />";
                        ?>
                        <span>Proveedor: <select id="slcModProveedorArt_<?php echo $i; ?>" name="slcModProveedorArt_<?php echo $i; ?>">
                                    <?php slcProveedores($idProveedor); ?> 
                                 </select></span>
                            <div style="clear: both;"></div>
                        <span>Precio proveedor: <input type="text" id="txtModPrecioProveedorArt_<?php echo $i; ?>" name="txtMostPrecioProveedorArt_<?php echo $i; ?>" value="<?php echo $pvpProveedor; ?>" size="6" /></span>
                            <div style="clear: both;"><br /></div>
                        <span>Familia: <select id="slcModFamiliaArt_<?php echo $i; ?>" name="slcModFamiliaArt_<?php echo $i; ?>" onchange="changeSubFamilia(this, <?php echo $i; ?>);">
                                    <?php slcFamilias($row['codfamilia']); ?> 
                                 </select></span>
                            <div style="clear: both;"></div>
                        <span>Subfamilia: <span style="float:  none; margin: 0;" id="spnModSubFamilia_<?php echo $i; ?>"><select id="slcModSubFamiliaArt_<?php echo $i; ?>" name="slcModSubFamiliaArt_<?php echo $i; ?>">
                                    <?php
                                    
                                    $consulta3 = "SELECT * FROM subfamilia WHERE idfamilia = '". $row['codfamilia'] ."' ORDER BY subfamilia;";
                                    $stsql3 = mysql_query($consulta3) or die(mysql_error());
                                    while ($row3 = mysql_fetch_assoc($stsql3)) {
                                        if($row3['codigo'] == $row['codsubfamilia']) echo '<option value="'. $row3['codigo'] .'" selected="selected">'. $row3['subfamilia'] .'</option>';
                                        else echo '<option value="'. $row3['codigo'] .'">'. $row3['subfamilia'] .'</option>';
                                    }
                                    
                                    ?>
                               </select></span></span>
                            <div style="clear: both;"></div>
                        <span>Descripcion: <input type="text" id="txtModDescripcionArt_<?php echo $i; ?>" name="txtModDescripcionArt_<?php echo $i; ?>" size="35" value="<?php echo trim($row['descripcion']); ?>" /></span>
                            <div style="clear: both;"></div>
                        <span>Detalles: <input type="text" id="txtModDetallesArt_<?php echo $i; ?>" name="txtModDetallesArt_<?php echo $i; ?>" size="35" value="<?php echo trim($row['detalles']); ?>" /></span>
                            <div style="clear: both;"></div>
                        <span>Precio en tienda: <input type="text" id="txtModPrecioTiendaArt_<?php echo $i; ?>" name="txtModPrecioTiendaArt_<?php echo $i; ?>" size="6" value="<?php echo trim($row['pvp']); ?>" /></span>
                            <div style="clear: both;"></div>
                        <span>Stock: <input type="text" id="txtModStockArt_<?php echo $i; ?>" name="txtModStockArt_<?php echo $i; ?>" size="6" value="<?php echo trim($row['stock']); ?>" /></span>
                            <div style="clear: both;"></div>
                        <span>Bajo minimo: <input type="text" id="txtModBajoMinimoArt_<?php echo $i; ?>" name="txtModBajoMinimoArt_<?php echo $i; ?>" size="6" value="<?php echo trim($row['bajominimo']); ?>" /></span>
                            <div style="clear: both;"></div>
                        <span>Mostrar en web: <select id="slcModMostrarWebArt_<?php echo $i; ?>" name="slcModMostrarWebArt_<?php echo $i; ?>">
                                                  <option value="si" <?php if(trim($row['mostrweb']) == 'si') echo "selected='selected'" ?>>Si</option>
                                                  <option value="no" <?php if(trim($row['mostrweb']) == 'no') echo "selected='selected'" ?>>No</option>
                                              </select></span>
                            <div style="clear: both;"></div>
                        <span>Oferta: <select id="slcModOfertaArt_<?php echo $i; ?>" name="slcModOfertaArt_<?php echo $i; ?>">
                                          <option value="si" <?php if(trim($row['oferta']) == 'si') echo "selected='selected'" ?>>Si</option>
                                          <option value="no" <?php if(trim($row['oferta']) == 'no') echo "selected='selected'" ?>>No</option>
                                      </select></span>
                            <div style="clear: both;"></div>
                        <span>Codigo de barras: <input type="text" id="txtModCodigoBarrasArt_<?php echo $i; ?>" name="txtModCodigoBarrasArt_<?php echo $i; ?>" size="14" value="<?php echo trim($row['codbarras']); ?>" /></span>
                            <div style="clear: both;"></div>
                        <span>IVA: <input type="text" id="txtModIvaArt_<?php echo $i; ?>" name="txtModIvaArt_<?php echo $i; ?>" size="5" value="<?php echo trim($row['iva']); ?>" /></span>
                            <div style="clear: both;"></div>
                            
                        <img src="img/btnInsertar.png" class="btnInsertar" onclick="modArticulo(<?php echo $i .", ". $row['id']; ?>);" />
                        
                        <?php
                        echo "</div>";
                    echo "<img src='img/boxAddBottomSub.png' /></div>";
                echo "</div></td>";
            echo "<td align='center'><input type='button' id='btnEliminarArt' name='btnEliminarArt' value='Eliminar' onclick='delArticulo(". $row['id'] .");' /></td>";
        echo "</tr>";
    }
    
    echo '</table>';
}

function addArticulo($proveedor, $pvpPro, $familia, $subfamilia, $descripcion, $detalles, $pvp, $stock, $bajoMinimo, $mostweb, $oferta, $codigoBarras, $iva){
    $queEmp = "SELECT * FROM articulos WHERE codfamilia = '". $familia ."' AND codsubfamilia = '". $subfamilia ."' AND codbarras = '". $codigoBarras ."';";
    $resEmp = mysql_query($queEmp) or die(mysql_error());
    $totEmp = mysql_num_rows($resEmp);
    
    if($totEmp == 0){
        $queEmp = "SELECT * FROM articulos WHERE codfamilia = '". $familia ."' AND codsubfamilia = '". $subfamilia ."';";
        $resEmp = mysql_query($queEmp) or die(mysql_error());
    
        $codigo = 0;
        while ($row = mysql_fetch_assoc($resEmp)) {
            $codigo = $row['codigo'];
        }
        
        $codigo += 1;
        if(strlen($codigo) == 1) $codigo = '0'. $codigo;
        
        
        $queEmp = "INSERT INTO articulos (codfamilia, codsubfamilia, codigo, descripcion, detalles, pvp, stock, bajominimo, mostrweb, oferta, codbarras, iva) VALUES ('". $familia ."', '". $subfamilia ."', '". $codigo ."', '". $descripcion ."', '". $detalles ."', '". $pvp ."', '". $stock ."', '". $bajoMinimo ."', '". $mostweb ."', '". $oferta ."', '". $codigoBarras ."', '". $iva ."');";
        $resEmp = mysql_query($queEmp) or die(mysql_error());
    }
    
    
    $queEmp = "SELECT * FROM articulos WHERE codfamilia = '". $familia ."' AND codsubfamilia = '". $subfamilia ."' AND codbarras = '". $codigoBarras ."';";
    $resEmp = mysql_query($queEmp) or die(mysql_error());
    $idArticulo = 0;
    while ($row = mysql_fetch_assoc($resEmp)) {
        $idArticulo = $row['id'];
    }
    
    $queEmp = "SELECT * FROM artpro WHERE idarticulo = '". $familia ."' AND idproveedor = '". $subfamilia ."';";
    $resEmp = mysql_query($queEmp) or die(mysql_error());
    $totEmp = mysql_num_rows($resEmp);
    
    if($totEmp == 0){
        $queEmp = "INSERT INTO artpro (idarticulo, idproveedor, precio) VALUES ('". $idArticulo ."', '". $proveedor ."', '". $pvpPro ."');";
        $resEmp = mysql_query($queEmp) or die(mysql_error());
    }
    
    
    echo "ok";
}


function modArticulo($id, $proveedor, $pvpPro, $familia, $subfamilia, $descripcion, $detalles, $pvp, $stock, $bajoMinimo, $mostweb, $oferta, $codigoBarras, $iva){
    $queEmp = "SELECT * FROM articulos WHERE codfamilia = '". $familia ."' AND codsubfamilia = '". $subfamilia ."';";
    $resEmp = mysql_query($queEmp) or die(mysql_error());
    
    $codigo = 0;
    while ($row = mysql_fetch_assoc($resEmp)) {
        $codigo = $row['codigo'];
    }
    
    $codigo += 1;
    if(strlen($codigo) == 1) $codigo = '0'. $codigo;
    
    $queEmp = "UPDATE articulos SET codfamilia = '". $familia ."', codsubfamilia = '". $subfamilia ."', codigo = '". $codigo ."', descripcion = '". $descripcion ."', detalles = '". $detalles ."', pvp = '". $pvp ."', stock = '". $stock ."', bajominimo = '". $bajoMinimo ."', mostrweb = '". $mostweb ."', oferta = '". $oferta ."', codbarras = '". $codigoBarras ."', iva = '". $iva ."' WHERE id = '". $id ."';";
    $resEmp = mysql_query($queEmp) or die(mysql_error());
    
    
    $queEmp = "SELECT * FROM artpro WHERE idproveedor = '". $proveedor ."' AND idarticulo = '". $id ."';";
    $resEmp = mysql_query($queEmp) or die(mysql_error());
    $totEmp = mysql_num_rows($resEmp);
    
    if($totEmp > 0){
        $queEmp = "UPDATE artpro SET idproveedor = '". $proveedor ."', precio = '". $pvpPro ."' WHERE idarticulo = '". $id ."';";
        $resEmp = mysql_query($queEmp) or die(mysql_error());
    }
    else {
        $queEmp = "INSERT INTO artpro (idarticulo, idproveedor, precio) VALUES ('". $id ."', '". $proveedor ."', '". $pvpPro ."');";
        $resEmp = mysql_query($queEmp) or die(mysql_error());
    }


    $codigo += 1;
    if(strlen($codigo) == 1) $codigo = '0'. $codigo;
    
    $queEmp = "UPDATE articulos SET codfamilia = '". $familia ."', codsubfamilia = '". $subfamilia ."', codigo = '". $codigo ."', descripcion = '". $descripcion ."', detalles = '". $detalles ."', pvp = '". $pvp ."', stock = '". $stock ."', bajominimo = '". $bajoMinimo ."', mostrweb = '". $mostweb ."', oferta = '". $oferta ."', codbarras = '". $codigoBarras ."', iva = '". $iva ."' WHERE id = '". $id ."';";
    $resEmp = mysql_query($queEmp) or die(mysql_error());
    
    $queEmp = "UPDATE artpro SET idproveedor = '". $proveedor ."', precio = '". $pvpPro ."' WHERE idarticulo = '". $id ."';";
    $resEmp = mysql_query($queEmp) or die(mysql_error());
}

function delArticulo($codigo){
    $queEmp = "DELETE FROM artpro WHERE idArticulo='". $codigo ."';";
    mysql_query($queEmp) or die(mysql_error());
    $queEmp = "DELETE FROM articulos WHERE id = '". $codigo ."';";
    mysql_query($queEmp) or die(mysql_error());
}

function searchSubFamilia($codFamilia, $idSlc){
    $send = '<select id="'. $idSlc .'" name="'. $idSlc .'">';
    $queEmp = "SELECT * FROM subfamilia WHERE idfamilia = '". $codFamilia ."' ORDER BY subfamilia;";
    $resEmp = mysql_query($queEmp) or die(mysql_error());
    $idArticulo = 0;
    while ($row = mysql_fetch_assoc($resEmp)) {
        $send .= '<option value="'. $row['codigo'] .'">'. $row['subfamilia'] .'</option>';
    }
    $send .= '</select>';
    
    echo $send;
}

?>