var pageWidth = screen.width;
var pageHeight = screen.height;


function var_dump(obj) {
   if(typeof obj == "object") {
      return "Type: "+typeof(obj)+((obj.constructor) ? "\nConstructor: "+obj.constructor : "")+"\nValue: " + obj;
   } else {
      return "Type: "+typeof(obj)+"\nValue: "+obj;
   }
}//end function var_dump

window.addEvent('domready', function() {
    $('documento').setStyle("width", pageWidth);
    $('documento').setStyle("height", pageHeight-101);
    
    $('menu').setStyle("width", pageWidth-50);
    
    $('menuBorder').setStyle("width", (pageWidth-50)-651);
    
    $('optArticulos').setStyle("display", "none");
    $('optClientes').setStyle("display", "none");
    $('optProveedores').setStyle("display", "none");
    $('optFacturacion').setStyle("display", "none");
    $('optEstadisticas').setStyle("display", "none");
    $('optUtilidades').setStyle("display", "none");
    
    var menuSlc = 1;
    $('menuOpt').addEvent('click', function(event){
        if(menuSlc == 1) $('articulos').set('class', 'articulos_On');
        else $('articulos').set('class', 'articulos');
        
        if(menuSlc == 2) $('clientes').set('class', 'clientes_On');
        else $('clientes').set('class', 'clientes');
        
        if(menuSlc == 3) $('proveedores').set('class', 'proveedores_On');
        else $('proveedores').set('class', 'proveedores');
        
        if(menuSlc == 4) $('facturacion').set('class', 'facturacion_On');
        else $('facturacion').set('class', 'facturacion');
        
        if(menuSlc == 5) $('estadisticas').set('class', 'estadisticas_On');
        else $('estadisticas').set('class', 'estadisticas');
        
        if(menuSlc == 6) $('utilidades').set('class', 'utilidades_On');
        else $('utilidades').set('class', 'utilidades');
    });
    
    $('articulos').addEvent('click', function(event){
        menuSlc = 1;
        
        $('optArticulos').setStyle("display", "block");
        $('optClientes').setStyle("display", "none");
        $('optProveedores').setStyle("display", "none");
        $('optFacturacion').setStyle("display", "none");
        $('optEstadisticas').setStyle("display", "none");
        $('optUtilidades').setStyle("display", "none");
    });
    
    $('clientes').addEvent('click', function(event){
        menuSlc = 2;
        
        $('optArticulos').setStyle("display", "none");
        $('optClientes').setStyle("display", "block");
        $('optProveedores').setStyle("display", "none");
        $('optFacturacion').setStyle("display", "none");
        $('optEstadisticas').setStyle("display", "none");
        $('optUtilidades').setStyle("display", "none");
    });
    
    $('proveedores').addEvent('click', function(event){
        menuSlc = 3;
        
        $('optArticulos').setStyle("display", "none");
        $('optClientes').setStyle("display", "none");
        $('optProveedores').setStyle("display", "block");
        $('optFacturacion').setStyle("display", "none");
        $('optEstadisticas').setStyle("display", "none");
        $('optUtilidades').setStyle("display", "none");
    });
    
    $('facturacion').addEvent('click', function(event){
        menuSlc = 4;
        
        $('optArticulos').setStyle("display", "none");
        $('optClientes').setStyle("display", "none");
        $('optProveedores').setStyle("display", "none");
        $('optFacturacion').setStyle("display", "block");
        $('optEstadisticas').setStyle("display", "none");
        $('optUtilidades').setStyle("display", "none");
    });
    
    $('estadisticas').addEvent('click', function(event){
        menuSlc = 5;
        
        $('optArticulos').setStyle("display", "none");
        $('optClientes').setStyle("display", "none");
        $('optProveedores').setStyle("display", "none");
        $('optFacturacion').setStyle("display", "none");
        $('optEstadisticas').setStyle("display", "block");
        $('optUtilidades').setStyle("display", "none");
    });
    
    $('utilidades').addEvent('click', function(event){
        menuSlc = 6;
        
        $('optArticulos').setStyle("display", "none");
        $('optClientes').setStyle("display", "none");
        $('optProveedores').setStyle("display", "none");
        $('optFacturacion').setStyle("display", "none");
        $('optEstadisticas').setStyle("display", "none");
        $('optUtilidades').setStyle("display", "block");
    });
    
    $('unlogin').addEvent('click', function(event){
        var req2 = new Request({
            method: 'get',
            url: 'fnc/fnc_gen.php',
            data: { 'fnc' : 'unlogin' },
            onComplete: function(response) {
                location.href = './';
                $('documento').innerHTML = response;
            }
        }).send();
    });
    
    
    $('logoHome').addEvent('click', function(){
        $('contenidoInt').innerHTML = '';
        $$('.subOpt_On').set('class', 'subOpt');
        
        $('optArticulos').setStyle("display", "none");
        $('optClientes').setStyle("display", "none");
        $('optProveedores').setStyle("display", "none");
        $('optFacturacion').setStyle("display", "none");
        $('optEstadisticas').setStyle("display", "none");
        $('optUtilidades').setStyle("display", "none");
        
        $('articulos').set('class', 'articulos');
        $('clientes').set('class', 'clientes');
        $('proveedores').set('class', 'proveedores');
        $('facturacion').set('class', 'facturacion');
        $('estadisticas').set('class', 'estadisticas');
        $('utilidades').set('class', 'utilidades');
    });
    
    
    $$('.subOpt').addEvent('click', function(){
        $$('.subOpt_On').set('class', 'subOpt');
        this.set('class', 'subOpt_On');
        
        subOptClick = this.href;
        
        subOptClick = subOptClick.split("?");
        subOptClick = subOptClick[1].split("&");
        
        subOptClick = subOptClick[0].split("=");
        
    	var req = new Request({
            method: 'get',
            url: 'fnc/fnc_controlOpciones.php',
            data: { 'optSelect' : subOptClick[1] },
            onComplete: function(response) {
                $('contenidoInt').innerHTML = response;
            }
        }).send();
        
    });
    
});