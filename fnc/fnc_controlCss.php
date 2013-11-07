<?php


if(isset($_SESSION['bs_user']) AND isset($_SESSION['bs_pass'])){
	echo '<link href="css/general.css" rel="stylesheet" type="text/css" />';
    
	echo '<link href="modulos/top/style.css" rel="stylesheet" type="text/css" />';
    
    
    
    
    
	echo '<link href="modulos/pie/style.css" rel="stylesheet" type="text/css" />';
}
else{
	echo '<link href="modulos/registro/style.css" rel="stylesheet" type="text/css" />';
}



?>