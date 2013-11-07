function searchArticulos(e){
    window.addEvent('domready', function() {
        var req = new Request({
            method: 'get',
            url: 'modulos/articulos/articulos/searchArticulos.php',
            data: { 'search' : e.value },
            onComplete: function(response) {
                $('tablaDatos').innerHTML = response;
            }
        }).send();
    });
}

function searchFamilia(e){
    window.addEvent('domready', function() {
        var req = new Request({
            method: 'get',
            url: 'modulos/articulos/articulos/searchSubFamilia.php',
            data: { 'codFamilia' : e.value, 'idSlc' : 'slcAddSubFamiliaArt' },
            onComplete: function(response) {
                $('slcSubFamilia').innerHTML = response;
            }
        }).send();
    });
}

function openAddBox(){
    window.addEvent('domready', function() {
        $$('.stlAddBox').setStyle("display", 'block');
    });
}

function openMostArt(box){
    window.addEvent('domready', function() {
        $('boxMostArt_'+ box).setStyle("display", 'block');
    });
}

function openModArtBox(box){
    window.addEvent('domready', function() {
        $('boxModArt_'+ box).setStyle("display", 'block');
    });
}



function closeAddBox(){
    window.addEvent('domready', function() {
        $$('.stlAddBox').setStyle("display", 'none');
    });
}

function closeMostArt(box){
    window.addEvent('domready', function() {
        $('boxMostArt_'+ box).setStyle("display", 'none');
    });
}


function closeModArtBox(box){
    window.addEvent('domready', function() {
        $('boxModArt_'+ box).setStyle("display", 'none');
    });
}



function addArticulo(){
    window.addEvent('domready', function() {
        proveedor       = $('slcAddProveedorArt').value;
        pvpProveedor    = $('txtAddPrecioProveedorArt').value;
        
        familia         = $('slcAddFamiliaArt').value;
        subFamilia      = $('slcAddSubFamiliaArt').value;
        descripcion     = $('txtAddDescripcionArt').value;
        detalles        = $('txtAddDetallesArt').value;
        pvp             = $('txtAddPrecioTiendaArt').value;
        stock           = $('txtAddStockArt').value;
        bajoMinimo      = $('txtAddBajoMinimoArt').value;
        mostrWeb        = $('slcAddMostrarWebArt').value;
        oferta          = $('slcAddOfertaArt').value;
        codBarras       = $('txtAddCodigoBarrasArt').value;
        iva             = $('txtAddIvaArt').value;
        
    
        var req = new Request({
            method: 'get',
            url: 'modulos/articulos/articulos/addArticulo.php',
            data: { 'proveedor' : proveedor, 'pvpProveedor' : pvpProveedor, 'familia' : familia, 'subFamilia' : subFamilia, 'descripcion' : descripcion, 'detalles' : detalles, 'pvp' : pvp, 'stock' : stock, 'bajoMinimo' : bajoMinimo, 'mostrWeb' : mostrWeb, 'oferta' : oferta, 'codBarras' : codBarras, 'iva' : iva },
            onComplete: function(response) {
                $('txtBuscarFamilia').value = descripcion;
                
                var req2 = new Request({
                    method: 'get',
                    url: 'modulos/articulos/articulos/searchArticulos.php',
                    data: { 'search' : descripcion },
                    onComplete: function(response) {
                        $$('.stlAddBox').setStyle("display", 'none');
                        
                        $('tablaDatos').innerHTML = response;
                    }
                }).send();
            }
        }).send();
    });
}

function modArticulo(box, id){
    window.addEvent('domready', function() {
        proveedor       = $('slcModProveedorArt_'+ box).value;
        pvpProveedor    = $('txtModPrecioProveedorArt_'+ box).value;

        familia         = $('slcModFamiliaArt_'+ box).value;
        subFamilia      = $('slcModSubFamiliaArt_'+ box).value;
        descripcion     = $('txtModDescripcionArt_'+ box).value;
        detalles        = $('txtModDetallesArt_'+ box).value;
        pvp             = $('txtModPrecioTiendaArt_'+ box).value;
        stock           = $('txtModStockArt_'+ box).value;
        bajoMinimo      = $('txtModBajoMinimoArt_'+ box).value;
        mostrWeb        = $('slcModMostrarWebArt_'+ box).value;
        oferta          = $('slcModOfertaArt_'+ box).value;
        codBarras       = $('txtModCodigoBarrasArt_'+ box).value;
        iva             = $('txtModIvaArt_'+ box).value;
        
        var req = new Request({
            method: 'get',
            url: 'modulos/articulos/articulos/modArticulo.php',
            data: { 'id' : id, 'proveedor' : proveedor, 'pvpProveedor' : pvpProveedor, 'familia' : familia, 'subFamilia' : subFamilia, 'descripcion' : descripcion, 'detalles' : detalles, 'pvp' : pvp, 'stock' : stock, 'bajoMinimo' : bajoMinimo, 'mostrWeb' : mostrWeb, 'oferta' : oferta, 'codBarras' : codBarras, 'iva' : iva },
            onComplete: function(response) {
                var req2 = new Request({
                    method: 'get',
                    url: 'modulos/articulos/articulos/searchArticulos.php',
                    data: { 'search' : $('txtBuscarFamilia').value },
                    onComplete: function(response) {
                        $$('.stlAddBox').setStyle("display", 'none');
                        
                        $('tablaDatos').innerHTML = response;
                    }
                }).send();
            }
        }).send();
    });
}

function delArticulo(codigo){
    if(confirm("esta seguro que quiere borrarlo?")){
        window.addEvent('domready', function() {
            var req = new Request({
                method: 'get',
                url: 'modulos/articulos/articulos/delArticulo.php',
                data: { 'codigo' : codigo },
                onComplete: function(response) {
                    $('txtBuscarFamilia').value = '';
                    
                    var req2 = new Request({
                        method: 'get',
                        url: 'modulos/articulos/articulos/searchArticulos.php',
                        data: { 'search' : '' },
                        onComplete: function(response) {
                            $$('.stlAddBox').setStyle("display", 'none');
                            
                            $('tablaDatos').innerHTML = response;
                        }
                    }).send();
                }
            }).send();
        });
    }
}

function changeSubFamilia(e, box){
    window.addEvent('domready', function() {
        var req = new Request({
            method: 'get',
            url: 'modulos/articulos/articulos/searchSubFamilia.php',
            data: { 'codFamilia' : e.value, 'idSlc' : 'slcModSubFamiliaArt_'+ box },
            onComplete: function(response) {
                $('spnModSubFamilia_'+ box).innerHTML = response;
            }
        }).send();
    });
}