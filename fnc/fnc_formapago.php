<?php

function loadFormaspago($filter = ''){
    echo '<table id="camposTabla" class="tablaDatos" width="100%" cellpadding="0" cellspacing="1">
            <tr>
                <td class="stlTitleTabla" style="width: auto">Denominacion</td>
                <td class="stlTitleTabla" style="width: auto;" >Observaciones</td>
                <td class="stlTitleTabla" style="width: 120px;">Modificar</td>
                <td class="stlTitleTabla" style="width: 120px;">Eliminar</td>
            </tr>';

    $consulta = "SELECT * FROM formapago WHERE denfp LIKE ('%" . $filter .
        "%') ORDER BY denfp;";
    $stsql = mysql_query($consulta) or die(mysql_error());
    $i = 0;
    while ($row = mysql_fetch_assoc($stsql)){
        $i++;

        echo "<tr class='tablaCeldas1'>";
            echo "<td align='center'><span style='color:blue;'>" . $row['denfp'] ."</span></td>";
            echo "<td align='center'>" . $row['observaciones'] . "</td>";
            
            // BOTON MODIFICAR CLIENTE
            echo "<td align='center' class='parteBox'>
                      <div style='position: relative;'>
                          <input type='button' id='btnModificarFormapago' name='btnModificarFormapago' class='btnInsFam' value='Modificar' onclick='openModificarFormapago(". $row['codfp'] .", ". $i .")' />
                          <spam id='boxModificarFormapago_". $i ."'></spam>
                      </div>
                  </td>";
            // FIN BOTON MODIFICAR CLIENTE
    
            // BOTON ELIMINAR CLIENTE
            echo "<td align='center' class='parteBox'>
                <div style='position: relative;'>
                    <input type='button' id='btnEliminarFormapago' name='btnEliminarFormapago' class='btnInsFam' value='Eliminar' onclick='delFormapago(". $row['codfp'] .")' />";
            echo "</div>";
            echo "</td>";
            // FIN BOTON ELIMINAR CLIENTE


        echo "</tr>";
    }

    echo '</table>';
}

function addFormapago($denominacion, $observacion){
    $queEmp = "SELECT * FROM formapago WHERE denfp = '". $denominacion ."';";
    $resEmp = mysql_query($queEmp) or die(mysql_error());
    $totEmp = mysql_num_rows($resEmp);
    
    if($totEmp == 0){
        $queEmp = "INSERT INTO formapago (denfp, observaciones) 
                    VALUES 
                    ('". $denominacion ."', '". $observacion ."');";
        $resEmp = mysql_query($queEmp) or die(mysql_error());
    }
}

function searchModificarFormapago($codigo){
    $return = "<div id='boxModFormapago' class='boxSubfamilia'><img src='img/boxAddTopSub.png' />";
        $return .= "<div class='intBoxSub' align='left'><img src='img/btnCancelar.png' class='btnClose' title='Cerrar' onclick='closeModFormapago();' />";
        
        $queEmp = "SELECT * FROM formapago WHERE codfp = '". $codigo ."';";
        $stsql = mysql_query($queEmp) or die(mysql_error());
        
        while ($row = mysql_fetch_assoc($stsql)){
            $return .= '<span>Denominacion: <input type="text" id="txtModDenominacionFormapago" name="txtModDenominacionFormapago" value="'. $row['denfp'] .'" size=39 /></span>
                            <div style="clear: both;"></div>
                        <span>Observaciones: <input type="text" id="txtModObservacionesFormapago" name="txtModObservacionesFormapago" value="'. $row['observaciones'] .'" size=38 /></span>
                            <div style="clear: both;"></div>
                            
                        
                        <img src="img/btnInsertar.png" class="btnInsertar" onclick="modFormapago('. $row['codfp'] .');" />';
            
        }
        
        
        $return .= "<div>";
    $return .= "<img src='img/boxAddBottomSub.png' /></div>";
    
    echo $return;
}

function modFormapago($codigo, $denominacion, $observacion){
    $queEmp = "UPDATE formapago SET denfp = '". $denominacion ."', observaciones = '". $observacion ."' WHERE codfp = '". $codigo ."';";
    $resEmp = mysql_query($queEmp) or die(mysql_error());
}


function delFormapago($codigo){
    $queEmp = "DELETE FROM formapago WHERE codfp = '". $codigo ."';";
    $resEmp = mysql_query($queEmp) or die(mysql_error());
}



?>