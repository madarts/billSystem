<?php

function loadFamilias($filter=''){
    echo '<table id="camposTabla" class="tablaDatos" width="100%" cellpadding="0" cellspacing="1">
            <tr>
                <td class="stlTitleTabla" style="width: 60px;">Cod.</td>
                <td class="stlTitleTabla" style="width: auto;">Familia / Subfamilia</td>
                <td class="stlTitleTabla" style="width: 100px;">Tiendasyn</td>
                <td class="stlTitleTabla" style="width: 100px;">Beneficios</td>
                <td class="stlTitleTabla" style="width: 120px;">Insertar</td>
                <td class="stlTitleTabla" style="width: 120px;">Modificar</td>
                <td class="stlTitleTabla" style="width: 120px;">Eliminar</td>
            </tr>';
        
    $consulta = "SELECT * FROM familia LEFT JOIN subfamilia ON familia.codigo = subfamilia.idfamilia WHERE familia LIKE ('%". $filter ."%') OR subfamilia LIKE ('%". $filter ."%') ORDER BY familia, subfamilia;";
    $stsql = mysql_query($consulta) or die(mysql_error());
    $familia = '';
    $i=0;
    $e=0;
    while ($row = mysql_fetch_assoc($stsql)) {
        $e++;
        if($familia != $row['familia']){
            $i++;
            echo "<tr class='tablaCeldas1'>";
                $consulta2 = "SELECT * FROM familia  WHERE familia = '". $row['familia'] ."';";
                $stsql2 = mysql_query($consulta2) or die(mysql_error());
                $codigo = 0;
                $id = 0;
                while ($row2 = mysql_fetch_assoc($stsql2)) {
                    $id = $row2['id'];
                    $codigo = $row2['codigo'];
                }
                
                echo "<td align='center'>". $codigo ."</td>";
                echo "<td>". $row['familia'] ."</td>";
                echo "<td align='center'>". $row['web'] ."</td>";
                echo "<td align='center'>-</td>";
                echo "<td align='center' class='parteBox'><div style='position: relative;'><input type='button' id='btnInsertarFam' name='btnInsertarFam' class='btnInsFam' value='subfamilia' onclick='openAddBoxSub(". $i .")' />";
                        echo "<div id='boxSubFamilia_". $i ."' class='boxSubfamilia'><img src='img/boxAddTopSub.png' />";
                            echo "<div class='intBoxSub' align='left'><img src='img/btnCancelar.png' class='btnClose' title='Cerrar' onclick='closeAddBoxSub(". $i .");'  />";
                            ?>
                            <span>Nombre: <input type="text" id="txtAddNombreSub_<?php echo $i; ?>" name="txtAddNombreSub_<?php echo $i; ?>" size="36" /></span>
                                <div style="clear: both;"></div>
                            <span>Mostrar en web: <select id="slcAddWebSub_<?php echo $i; ?>" name="slcAddWebSub_<?php echo $i; ?>">
                                           <option value="si" selected="true">si</option>
                                           <option value="no">no</option>
                                       </select></span>
                                <div style="clear: both;"></div>
                            <span>Beneficios: <input type="text" id="txtAddBeneficiosSub_<?php echo $i; ?>" name="txtAddBeneficiosSub_<?php echo $i; ?>" size="6" /></span>
                                <div style="clear: both;"></div>
                                
                            <img src="img/btnInsertar.png" class="btnInsertar" onclick="addSubfamilia(<?php echo $i .", ". $codigo; ?>);" />
                            
                            <?php
                            echo "</div>";
                        echo "<img src='img/boxAddBottomSub.png' /></div>";
                    echo "</div></td>";
                echo "<td align='center' class='parteBox'><div style='position: relative;'><input type='button' id='btnModificarFam' name='btnModificarFam' class='btnModFam' value='Modificar' onclick='openModBox(". $i .")' />";
                        echo "<div id='boxModFamilia_". $i ."' class='boxSubfamilia'><img src='img/boxAddTopSub.png' />";
                            echo "<div class='intBoxSub' align='left'><img src='img/btnCancelar.png' class='btnClose' title='Cerrar' onclick='closeModBox(". $i .");'  />";
                            ?>
                            <span>Nombre: <input type="text" id="txtModNombre_<?php echo $i; ?>" name="txtModNombre_<?php echo $i; ?>" size="36" value="<?php echo $row['familia']; ?>" /></span>
                                <div style="clear: both;"></div>
                            <span>Mostrar en web: <select id="slcModWeb_<?php echo $i; ?>" name="slcModWeb_<?php echo $i; ?>">
                                           <option value="si" <?php if($row['web'] == 'si') echo 'selected="selected"'; ?>>si</option>
                                           <option value="no" <?php if($row['web'] == 'no') echo 'selected="selected"'; ?>>no</option>
                                       </select></span>
                                <div style="clear: both;"></div>
                                
                            <img src="img/btnInsertar.png" class="btnInsertar" onclick="modFamilia(<?php echo $i .", ". $id; ?>);" />
                            
                            <?php
                            echo "</div>";
                        echo "<img src='img/boxAddBottomSub.png' /></div>";
                    echo "</div></td>";
                echo "<td align='center'><input type='button' id='btnEliminarFam' name='btnEliminarFam' value='Eliminar' onclick='delFamilia(". $id .");' /></td>";
            echo "</tr>";
        }
        
        if($row['codigo'] != '' OR $row['subfamilia'] != '' OR $row['mostweb'] != '' OR $row['beneficios'] != ''){
            echo "<tr class='tablaCeldas2'>";
                echo "<td align='center'>". $row['codigo'] ."</td>";
                echo "<td>". $row['subfamilia'] ."</td>";
                echo "<td align='center'>". $row['mostweb'] ."</td>";
                echo "<td align='center'>". $row['beneficios'] ."</td>";
                echo "<td align='center'>-</td>";
                echo "<td align='center' class='parteBox'><div style='position: relative;'><input type='button' id='btnModificarSubFam' name='btnModificarSubFam' class='btnModSubFam' value='Modificar' onclick='openModBoxSub(". $e .")' />";
                        echo "<div id='boxModSubFamilia_". $e ."' class='boxSubfamilia'><img src='img/boxAddTopSub.png' />";
                            echo "<div class='intBoxSub' align='left'><img src='img/btnCancelar.png' class='btnClose' title='Cerrar' onclick='closeModBoxSub(". $e .");'  />";
                            ?>
                            <span>Nombre: <input type="text" id="txtModNombreSub_<?php echo $e; ?>" name="txtModNombreSub_<?php echo $e; ?>" size="36" value="<?php echo $row['subfamilia']; ?>" /></span>
                                <div style="clear: both;"></div>
                            <span>Mostrar en web: <select id="slcModWebSub_<?php echo $e; ?>" name="slcModWebSub_<?php echo $e; ?>">
                                           <option value="si" <?php if($row['mostweb'] == 'si') echo 'selected="selected"'; ?>>si</option>
                                           <option value="no" <?php if($row['mostweb'] == 'no') echo 'selected="selected"'; ?>>no</option>
                                       </select></span>
                                <div style="clear: both;"></div>
                            <span>Beneficios: <input type="text" id="txtModBeneficiosSub_<?php echo $e; ?>" name="txtModBeneficiosSub_<?php echo $e; ?>" size="6" value="<?php echo $row['beneficios']; ?>" /></span>
                                <div style="clear: both;"></div>
                                
                            <img src="img/btnInsertar.png" class="btnInsertar" onclick="modSubFamilia(<?php echo $e .", ". $row['id']; ?>);" />
                            
                            <?php
                            echo "</div>";
                        echo "<img src='img/boxAddBottomSub.png' /></div>";
                    echo "</div></td>";
                echo "<td align='center'><input type='button' id='btnEliminarSubFam' name='btnEliminarSubFam' value='Eliminar' onclick='delSubFamilia(". $row['id'] .");' /></td>";
            echo "</tr>";
        }
        
        $familia = $row['familia'];
    }
    
    echo '</table>';
}

function addFamilia($nombre, $web){
    $queEmp = "SELECT * FROM familia WHERE familia = '". $nombre ."';";
    $resEmp = mysql_query($queEmp) or die(mysql_error());
    $totEmp = mysql_num_rows($resEmp);
    
    if($totEmp == 0){
        $queEmp = "SELECT * FROM familia;";
        $resEmp = mysql_query($queEmp) or die(mysql_error());
    
        $codigo = 0;
        while ($row = mysql_fetch_assoc($resEmp)) {
            $codigo = $row['codigo'];
        }
        
        $codigo += 1;
        if(strlen($codigo) == 1) $codigo = '0'. $codigo;
        
        $queEmp = "INSERT INTO familia (codigo, familia, web) VALUES ('". $codigo ."', '". $nombre ."', '". $web ."');";
        $resEmp = mysql_query($queEmp) or die(mysql_error());
        
        echo "ok";
    }
}

function addSubFamilia($cod, $nombre, $web, $beneficios){
    $queEmp = "SELECT * FROM subfamilia WHERE idfamilia = '". $cod ."' AND subfamilia = '". $nombre ."';";
    $resEmp = mysql_query($queEmp) or die(mysql_error());
    $totEmp = mysql_num_rows($resEmp);
    
    if($totEmp == 0){
        $queEmp = "SELECT * FROM subfamilia WHERE idfamilia = '". $cod ."';";
        $resEmp = mysql_query($queEmp) or die(mysql_error());
    
        $codigo = 0;
        while ($row = mysql_fetch_assoc($resEmp)) {
            $codigo = $row['codigo'];
        }
        
        $codigo += 1;
        if(strlen($codigo) == 1) $codigo = '0'. $codigo;
        
        $queEmp = "INSERT INTO subfamilia (idfamilia, codigo, subfamilia, beneficios, mostweb) VALUES ('". $cod ."', '". $codigo ."', '". $nombre ."', '". $beneficios ."', '". $web ."');";
        $resEmp = mysql_query($queEmp) or die(mysql_error());
    }
}

function modFamilia($id, $nombre, $web){
    $queEmp = "UPDATE familia SET familia = '". $nombre ."', web='". $web ."' WHERE id = '". $id ."';";
    mysql_query($queEmp) or die(mysql_error());
}

function modSubFamilia($id, $nombre, $web, $beneficios){
    $queEmp = "UPDATE subfamilia SET subfamilia='". $nombre ."', mostweb='". $web ."', beneficios='". $beneficios ."' WHERE id = '". $id ."';";
    mysql_query($queEmp) or die(mysql_error());
}

function delFamilia($codigo){
    $queEmp = "DELETE FROM subfamilia WHERE idfamilia = ( SELECT codigo FROM familia WHERE id =  '". $codigo ."' )";
    mysql_query($queEmp) or die(mysql_error());
    $queEmp = "DELETE FROM familia WHERE id = '". $codigo ."';";
    mysql_query($queEmp) or die(mysql_error());
}

function delSubFamilia($codigo){
    $queEmp = "DELETE FROM subfamilia WHERE id='". $codigo ."'";
    mysql_query($queEmp) or die(mysql_error());
}

?>