function isset(variable_name) {
    try {
         if (typeof(eval(variable_name)) != 'undefined')
         if (eval(variable_name) != null)
         return true;
     } catch(e) { }
    return false;
}

function searchFormapago(e){
    window.addEvent('domready', function() {
        var req = new Request({
            method: 'get',
            url: 'modulos/clientes/formapago/searchFormapago.php',
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

function addFormapago(){
    window.addEvent('domready', function() {
       
        denominacion    = $('txtAddDenominacionFormapago').value;
        observacion     = $('txtAddObservacionFormapago').value;
        
        var req = new Request({
            method: 'get',
            url: 'modulos/clientes/formapago/addFormapago.php',
            data: { 'denominacion' : denominacion,
                    'observacion': observacion},
            onComplete: function(response) {
                $$('.stlAddBox').setStyle("display", 'none');
                
                searchFormapago('')
            }
        }).send();
    });
}




delboxMod = 0;
function openModificarFormapago(codigo, box){
    window.addEvent('domready', function() {
        if(isset($('boxModificarFormapago_'+ delboxMod)))
            $('boxModificarFormapago_'+ delboxMod).innerHTML = '';
       
        var req = new Request({
            method: 'get',
            url: 'modulos/clientes/formapago/searchFormapagoInfo.php',
            data: { 'codigo' : codigo },
            onComplete: function(response) {
                $('boxModificarFormapago_'+ box).innerHTML = response;
                $('boxModFormapago').setStyle("display", 'block');
            }
        }).send();
        
        delboxMod = box;
    });
}

function closeModFormapago(){
    window.addEvent('domready', function() {
        $('boxModificarFormapago_'+ delboxMod).innerHTML = '';
        delboxMod = 0;
    });
}


function modFormapago(codigo){
    window.addEvent('domready', function() {
       
        denominacion    = $('txtModDenominacionFormapago').value;
        observacion     = $('txtModObservacionesFormapago').value;
        
        var req = new Request({
            method: 'get',
            url: 'modulos/clientes/formapago/modFormapago.php',
            data: { 'codigo': codigo,
                    'denominacion' : denominacion,
                    'observacion': observacion},
            onComplete: function(response) {
                $('boxModificarFormapago_'+ delboxMod).innerHTML = '';
                delboxMod = 0;
                
                searchFormapago('')
            }
        }).send();
    });
}



function delFormapago(delId){
    if(confirm("esta seguro que quiere borrarlo?")){
        window.addEvent('domready', function() {
            var req = new Request({
                method: 'get',
                url: 'modulos/clientes/formapago/delFormapago.php',
                data: { 'codFormapago' : delId },
                onComplete: function(response) {
                    searchFormapago('');
                }
            }).send();
        });
    }
}