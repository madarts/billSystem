function isset(variable_name) {
    try {
         if (typeof(eval(variable_name)) != 'undefined')
         if (eval(variable_name) != null)
         return true;
     } catch(e) { }
    return false;
}

function searchClientes(e){
    window.addEvent('domready', function() {
        var req = new Request({
            method: 'get',
            url: 'modulos/clientes/clientes/searchClientes.php',
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

function addCliente(){
    window.addEvent('domready', function() {
       
        nombre          = $('txtAddNombreCliente').value;
        nif             = $('txtAddNifCliente').value;
        formapago       = $('slcAddFormaPagoCliente').value;
        direccion       = $('txtAddDireccionCliente').value;
        localidad       = $('txtAddLocalidadCliente').value;
        cp              = $('txtAddCPCliente').value;
        provincia       = $('slcAddProvinciaCliente').value;
        telefono        = $('txtAddTelefonoCliente').value;
        fax             = $('txtAddFaxCliente').value;
        movil           = $('txtAddMovilCliente').value;
        cuentacorriente = $('txtAddCuentaCorrienteCliente').value;
        web             = $('txtAddWebCliente').value;
        email           = $('txtAddEmailCliente').value;
        descuento       = $('txtAddDescuentoCliente').value;
        irpf            = $('txtAddIRPFCliente').value;
        observaciones   = $('txtAddObservacionesCliente').value;
        
        var req = new Request({
            method: 'get',
            url: 'modulos/clientes/clientes/addCliente.php',
            data: { 'nombre' : nombre,
                    'nif': nif,
                    'formapago': formapago,
                    'direccion': direccion,
                    'localidad': localidad,
                    'cp': cp,
                    'provincia': provincia,
                    'telefono': telefono,
                    'fax': fax,
                    'movil': movil,
                    'cuentacorriente': cuentacorriente,
                    'web': web,
                    'email': email,
                    'descuento': descuento,
                    'irpf': irpf,
                    'observaciones': observaciones},
            onComplete: function(response) {
                $('txtBuscarClientes').value = nombre;
                $$('.stlAddBox').setStyle("display", 'none');
                
                searchClientes(nombre)
            }
        }).send();
    });
}

delbox = 0;
function openVerCliente(codigo, box){
    window.addEvent('domready', function() {
        if(isset($('boxVerCliente_'+ delbox)))
            $('boxVerCliente_'+ delbox).innerHTML = '';
        
        var req = new Request({
            method: 'get',
            url: 'modulos/clientes/clientes/searchClienteInfo.php',
            data: { 'codigo' : codigo, 'opt': 1 },
            onComplete: function(response) {
                $('boxVerCliente_'+ box).innerHTML = response;
                $('boxMosCliente').setStyle("display", 'block');
            }
        }).send();
        
        delbox = box;
    });
}

function closeVerClientes(){
    window.addEvent('domready', function() {
        $('boxVerCliente_'+ delbox).innerHTML = '';
        delbox = 0;
    });
}




delboxMod = 0;
function openModificarCliente(codigo, box){
    window.addEvent('domready', function() {
        if(isset($('boxModificarCliente_'+ delboxMod)))
            $('boxModificarCliente_'+ delboxMod).innerHTML = '';
       
        var req = new Request({
            method: 'get',
            url: 'modulos/clientes/clientes/searchClienteInfo.php',
            data: { 'codigo' : codigo, 'opt': 2 },
            onComplete: function(response) {
                $('boxModificarCliente_'+ box).innerHTML = response;
                $('boxModCliente').setStyle("display", 'block');
            }
        }).send();
        
        delboxMod = box;
    });
}

function closeModClientes(){
    window.addEvent('domready', function() {
        $('boxModificarCliente_'+ delboxMod).innerHTML = '';
        delboxMod = 0;
    });
}


function modCliente(codigo){
    window.addEvent('domready', function() {
       
        nombre          = $('txtModNombreCliente').value;
        nif             = $('txtModNifCliente').value;
        formapago       = $('slcModFormaPagoCliente').value;
        direccion       = $('txtModDireccionCliente').value;
        localidad       = $('txtModLocalidadCliente').value;
        cp              = $('txtModCPCliente').value;
        provincia       = $('slcModProvinciaCliente').value;
        telefono        = $('txtModTelefonoCliente').value;
        fax             = $('txtModFaxCliente').value;
        movil           = $('txtModMovilCliente').value;
        cuentacorriente = $('txtModCuentaCorrienteCliente').value;
        web             = $('txtModWebCliente').value;
        email           = $('txtModEmailCliente').value;
        descuento       = $('txtModDescuentoCliente').value;
        irpf            = $('txtModIRPFCliente').value;
        observaciones   = $('txtModObservacionesCliente').value;
        
        var req = new Request({
            method: 'get',
            url: 'modulos/clientes/clientes/modCliente.php',
            data: { 'codigo': codigo,
                    'nombre' : nombre,
                    'nif': nif,
                    'formapago': formapago,
                    'direccion': direccion,
                    'localidad': localidad,
                    'cp': cp,
                    'provincia': provincia,
                    'telefono': telefono,
                    'fax': fax,
                    'movil': movil,
                    'cuentacorriente': cuentacorriente,
                    'web': web,
                    'email': email,
                    'descuento': descuento,
                    'irpf': irpf,
                    'observaciones': observaciones},
            onComplete: function(response) {
                $('txtBuscarClientes').value = nombre;
                $$('.stlModBox').setStyle("display", 'none');
                
                searchClientes(nombre)
            }
        }).send();
    });
}



function delClientes(delId){
    if(confirm("esta seguro que quiere borrarlo?")){
        window.addEvent('domready', function() {
            var req = new Request({
                method: 'get',
                url: 'modulos/clientes/clientes/delCliente.php',
                data: { 'codCliente' : delId },
                onComplete: function(response) {
                    searchClientes($('txtBuscarClientes').value)
                }
            }).send();
        });
    }
}