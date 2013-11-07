<?php


if(isset($_SESSION['bs_user']) AND isset($_SESSION['bs_pass'])){
    include("cfg/connect.php");
            
    include('modulos/top/index.php');
    
    echo "<div id='contenido' class='contenidoWeb'>";
        echo "<div id='contenidoInt' class='contenidoInterior'>";
    
        echo "</div>";
    echo "</div>";
    
    
    
    include('modulos/pie/index.php');
}
else{
	include('modulos/registro/index.php');
}



?>