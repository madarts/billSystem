function isset(variable_name) {
    try {
         if (typeof(eval(variable_name)) != 'undefined')
         if (eval(variable_name) != null)
         return true;
     } catch(e) { }
    return false;
}

function searchProveedores(e){
    window.addEvent('domready', function() {
        var req = new Request({
            method: 'get',
            url: 'modulos/proveedores/proveedores/searchProveedor.php',
            data: { 'search' : e },
            onComplete: function(response) {
                $('tablaDatos').innerHTML = response;
            }
        }).send();
    });
}

function openAddBox(){
    window.addEvent('domready', function() {
        $$('.stlAddBox').setStyle("display", 'block');
    });
}

function closeAddBox(){
    window.addEvent('domready', function() {
        $$('.stlAddBox').setStyle("display", 'none');
    });
}

function addProveedor(){
    window.addEvent('domready', function() {
       
        nombre          = $('txtAddNombreProveedor').value;
        nif             = $('txtAddNifProveedor').value;
        direccion       = $('txtAddDireccionProveedor').value;
        localidad       = $('txtAddLocalidadProveedor').value;
        cp              = $('txtAddCPProveedor').value;
        provincia       = $('slcAddProvinciaProveedor').value;
        telefono        = $('txtAddTelefonoProveedor').value;
        fax             = $('txtAddFaxProveedor').value;
        movil           = $('txtAddMovilProveedor').value;
        web             = $('txtAddWebProveedor').value;
        email           = $('txtAddEmailProveedor').value;
        persona         = $('txtAddPersonaProveedor').value;
        cargo           = $('txtAddCargoProveedor').value;
        irpf            = $('txtAddIRPFProveedor').value;
        observaciones   = $('txtAddObservacionesProveedor').value;
        
        var req = new Request({
            method: 'get',
            url: 'modulos/proveedores/proveedores/addProveedor.php',
            data: { 'nombre' : nombre,
                    'nif': nif,
                    'direccion': direccion,
                    'localidad': localidad,
                    'cp': cp,
                    'provincia': provincia,
                    'telefono': telefono,
                    'fax': fax,
                    'movil': movil,
                    'web': web,
                    'email': email,
                    'persona': persona,
                    'cargo': cargo,
                    'irpf': irpf,
                    'observaciones': observaciones},
            onComplete: function(response) {
                $('txtBuscarProveedor').value = nombre;
                $$('.stlAddBox').setStyle("display", 'none');
                
                searchProveedores(nombre);
            }
        }).send();
    });
}

delbox = 0;
function openVerProveedor(codigo, box){
    window.addEvent('domready', function() {
        if(isset($('boxVerProveedor_'+ delbox)))
            $('boxVerProveedor_'+ delbox).innerHTML = '';
        
        var req = new Request({
            method: 'get',
            url: 'modulos/proveedores/proveedores/searchProveedorInfo.php',
            data: { 'codigo' : codigo, 'opt': 1 },
            onComplete: function(response) {
                $('boxVerProveedor_'+ box).innerHTML = response;
                $('boxMosProveedor').setStyle("display", 'block');
            }
        }).send();
        
        delbox = box;
    });
}

function closeVerProveedor(){
    window.addEvent('domready', function() {
        $('boxVerProveedor_'+ delbox).innerHTML = '';
        delbox = 0;
    });
}




delboxMod = 0;
function openModificarProveedor(codigo, box){
    window.addEvent('domready', function() {
        if(isset($('boxModificarProveedor_'+ delboxMod)))
            $('boxModificarProveedor_'+ delboxMod).innerHTML = '';
       
        var req = new Request({
            method: 'get',
            url: 'modulos/proveedores/proveedores/searchProveedorInfo.php',
            data: { 'codigo' : codigo, 'opt': 2 },
            onComplete: function(response) {
                $('boxModificarProveedor_'+ box).innerHTML = response;
                $('boxModProveedor').setStyle("display", 'block');
            }
        }).send();
        
        delboxMod = box;
    });
}

function closeModProveedor(){
    window.addEvent('domready', function() {
        $('boxModificarProveedor_'+ delboxMod).innerHTML = '';
        delboxMod = 0;
    });
}


function modProveedor(codigo){
    window.addEvent('domready', function() {
       
        nombre          = $('txtModNombreProveedor').value;
        nif             = $('txtModNifProveedor').value;
        direccion       = $('txtModDireccionProveedor').value;
        localidad       = $('txtModLocalidadProveedor').value;
        cp              = $('txtModCPProveedor').value;
        provincia       = $('slcModProvinciaProveedor').value;
        telefono        = $('txtModTelefonoProveedor').value;
        fax             = $('txtModFaxProveedor').value;
        movil           = $('txtModMovilProveedor').value;
        web             = $('txtModWebProveedor').value;
        email           = $('txtModEmailproveedor').value;
        persona         = $('txtModPersonaProveedor').value;
        cargo           = $('txtModCargoProveedor').value;
        irpf            = $('txtModIRPFProveedor').value;
        observaciones   = $('txtModObservacionesProveedor').value;
        
        var req = new Request({
            method: 'get',
            url: 'modulos/proveedores/proveedores/modProveedor.php',
            data: { 'codigo': codigo,
                    'nombre' : nombre,
                    'nif': nif,
                    'direccion': direccion,
                    'localidad': localidad,
                    'cp': cp,
                    'provincia': provincia,
                    'telefono': telefono,
                    'fax': fax,
                    'movil': movil,
                    'web': web,
                    'email': email,
                    'persona': persona,
                    'cargo': cargo,
                    'irpf': irpf,
                    'observaciones': observaciones},
            onComplete: function(response) {
                $('txtBuscarProveedor').value = nombre;
                $$('.stlModBox').setStyle("display", 'none');
                
                searchProveedores(nombre)
            }
        }).send();
    });
}



function delProveedor(delId){
    if(confirm("esta seguro que quiere borrarlo?")){
        window.addEvent('domready', function() {
            var req = new Request({
                method: 'get',
                url: 'modulos/proveedores/proveedores/delProveedor.php',
                data: { 'codigo' : delId },
                onComplete: function(response) {
                    searchProveedores($('txtBuscarProveedor').value)
                }
            }).send();
        });
    }
}