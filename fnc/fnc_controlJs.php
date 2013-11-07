<?php


if(isset($_SESSION['bs_user']) AND isset($_SESSION['bs_pass'])){
	echo '<script src="js/general.js"></script>';
    
    //PARTE DE ARCHIVOS PARA **ARTICULOS** //
	echo '<script src="js/familias.js"></script>';
	echo '<script src="js/articulos.js"></script>';
    
	echo '<script src="js/clientes.js"></script>';
	echo '<script src="js/formapago.js"></script>';
	echo '<script src="js/provincias.js"></script>';
    
	echo '<script src="js/proveedores.js"></script>';
	echo '<script src="js/precioproveedores.js"></script>';
    
    
    
	echo '<script src="modulos/top/script.js"></script>';
    
    
    
    
    
    
	echo '<script src="modulos/pie/script.js"></script>';
}
else{

}



?>