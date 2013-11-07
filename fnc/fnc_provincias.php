<?php

function loadProvincias($filter = ''){
    echo '<table id="camposTabla" class="tablaDatos" width="100%" cellpadding="0" cellspacing="1">
            <tr>
                <td class="stlTitleTabla" style="width: auto">Provincia</td>
                <td class="stlTitleTabla" style="width: 120px;">Modificar</td>
                <td class="stlTitleTabla" style="width: 120px;">Eliminar</td>
            </tr>';

    $consulta = "SELECT * FROM provincias WHERE denprovincia LIKE ('%" . $filter .
        "%') ORDER BY denprovincia;";
    $stsql = mysql_query($consulta) or die(mysql_error());
    $i = 0;
    while ($row = mysql_fetch_assoc($stsql)){
        $i++;

        echo "<tr class='tablaCeldas1'>";
            echo "<td align='center'><span style='color:blue;'>" . $row['denprovincia'] ."</span></td>";
            
            // BOTON MODIFICAR CLIENTE
            echo "<td align='center' class='parteBox'>
                      <div style='position: relative;'>
                          <input type='button' id='btnModificarProvincia' name='btnModificarProvincia' class='btnInsFam' value='Modificar' onclick='openModificarProvincia(". $row['codprovincia'] .", ". $i .")' />
                          <spam id='boxModificarProvincia_". $i ."'></spam>
                      </div>
                  </td>";
            // FIN BOTON MODIFICAR CLIENTE
    
            // BOTON ELIMINAR CLIENTE
            echo "<td align='center' class='parteBox'>
                <div style='position: relative;'>
                    <input type='button' id='btnEliminarprovincia' name='btnEliminarprovincia' class='btnInsFam' value='Eliminar' onclick='delProvincia(". $row['codprovincia'] .")' />";
            echo "</div>";
            echo "</td>";
            // FIN BOTON ELIMINAR CLIENTE


        echo "</tr>";
    }

    echo '</table>';
}

function addProvincia($provincia){
    $queEmp = "SELECT * FROM provincias WHERE denprovincia = '". $provincia ."';";
    $resEmp = mysql_query($queEmp) or die(mysql_error());
    $totEmp = mysql_num_rows($resEmp);
    
    if($totEmp == 0){
        $queEmp = "INSERT INTO provincias (denprovincia) 
                    VALUES 
                    ('". $provincia ."');";
        $resEmp = mysql_query($queEmp) or die(mysql_error());
    }
}

function searchModificarProvincias($codigo){
    $return = "<div id='boxModProvincias' class='boxSubfamilia'><img src='img/boxAddTopSub.png' />";
        $return .= "<div class='intBoxSub' align='left'><img src='img/btnCancelar.png' class='btnClose' title='Cerrar' onclick='closeModProvincias();' />";
        
        $queEmp = "SELECT * FROM provincias WHERE codprovincia = '". $codigo ."';";
        $stsql = mysql_query($queEmp) or die(mysql_error());
        
        while ($row = mysql_fetch_assoc($stsql)){
            $return .= '<span>Provincia: <input type="text" id="txtModNombreProvincia" name="txtModNombreProvincia" value="'. $row['denprovincia'] .'" size=39 /></span>
                            <div style="clear: both;"></div>
                            
                        
                        <img src="img/btnInsertar.png" class="btnInsertar" onclick="modProvincia('. $row['codprovincia'] .');" />';
            
        }
        
        
        $return .= "<div>";
    $return .= "<img src='img/boxAddBottomSub.png' /></div>";
    
    echo $return;
}

function modProvincias($codigo, $provincia){
    $queEmp = "UPDATE provincias SET denprovincia = '". $provincia ."' WHERE codprovincia = '". $codigo ."';";
    $resEmp = mysql_query($queEmp) or die(mysql_error());
}


function delProvincia($codigo){
    $queEmp = "DELETE FROM provincias WHERE codprovincia = '". $codigo ."';";
    $resEmp = mysql_query($queEmp) or die(mysql_error());
}



?>