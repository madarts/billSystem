var pageWidth = screen.width;
var pageHeight = screen.height;

window.addEvent('domready', function() {
    $('contenido').setStyle("width", pageWidth-50);
    
    $('contenido').setStyle("height", pageHeight-350);
    $('contenidoInt').setStyle("height", pageHeight-350);
});