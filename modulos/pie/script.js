var pageWidth = screen.width;
var pageHeight = screen.height;

window.addEvent('domready', function() {
    $('pieContenido').setStyle("width", pageWidth-50);
    $$('.centroPie').setStyle("width", pageWidth-72);
});