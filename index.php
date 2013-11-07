<?php
session_start();
?>

<!DOCTYPE html>

<html>

<head>
	<title>Bill System</title>
    
    <script language="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script><!-- Actualizar -->
    <script>
    jQuery.noConflict();
    jQuery(document).ready(function() {
        // Para navegadores que soportan la función.
        if (typeof window.history.pushState == 'function') {
            pushstate();            
        }else{
            check(); hash();
        }
    });
    // Chequear si existe el hash.
    function check(){
        var direccion = ""+window.location+"";
        var nombre = direccion.split("#!");
        if(nombre.length > 1){
            var url = nombre[1]; 
            //alert(url);
        }
    }
    
    function pushstate(){
        var links = jQuery("a");
        // Evento al hacer click.
        links.live('click', function(event) {
            var url = jQuery(this).attr('href');
            // Cambio el historial del navegador.
            history.pushState({ path: url }, url, url);
            // Muestro la nueva url
            //alert(url);
            return false;
        });
        
        // Función para determinar cuando cambia la url de la página.
        jQuery(window).bind('popstate', function(event) {
            var state = event.originalEvent.state;
            if (state) {
                // Mostrar url.
                //alert(state.path);
            }
        });
    }
    
    function hash(){
        // Para i.e
        // Función para determinar cuando cambia el hash de la página.
        jQuery(window).bind("hashchange",function(){
            var hash = ""+window.location.hash+"";
            hash = hash.replace("#!","")
            if(hash && hash != ""){
                //alert(hash);
            }
        }); 
        // Evento al hacer click.
        jQuery("a").bind('click', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            // Cambio el historial del navegador.
            window.location.hash = "#!"+url;
            //$(window).trigger("hashchange");
            return false
        });
    }
    </script>
    
    
    <script src="js/mootools.js"></script>
    <script src="js/mootools-more.js"></script>
	
    <script src="js/script.js"></script>
    <?php include('fnc/fnc_controlJs.php'); ?>
    
   
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <?php include('fnc/fnc_controlCss.php'); ?>
</head>

<body id="documento">


<?php include('fnc/fnc_controlModulos.php'); ?>


</body>
</html>