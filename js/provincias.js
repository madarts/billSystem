function isset(variable_name) {
    try {
         if (typeof(eval(variable_name)) != 'undefined')
         if (eval(variable_name) != null)
         return true;
     } catch(e) { }
    return false;
}

function searchProvincias(e){
    window.addEvent('domready', function() {
        var req = new Request({
            method: 'get',
            url: 'modulos/clientes/provincias/searchProvincias.php',
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

function addprovincia(){
    window.addEvent('domready', function() {
       
        provincia    = $('txtAddNombreProvincia').value;
        
        var req = new Request({
            method: 'get',
            url: 'modulos/clientes/provincias/addProvincia.php',
            data: { 'provincia' : provincia},
            onComplete: function(response) {
                $$('.stlAddBox').setStyle("display", 'none');
                
                searchProvincias('')
            }
        }).send();
    });
}




delboxMod = 0;
function openModificarProvincia(codigo, box){
    window.addEvent('domready', function() {
        if(isset($('boxModificarProvincia_'+ delboxMod)))
            $('boxModificarProvincia_'+ delboxMod).innerHTML = '';
       
        var req = new Request({
            method: 'get',
            url: 'modulos/clientes/provincias/searchProvinciasInfo.php',
            data: { 'codigo' : codigo },
            onComplete: function(response) {
                $('boxModificarProvincia_'+ box).innerHTML = response;
                $('boxModProvincias').setStyle("display", 'block');
            }
        }).send();
        
        delboxMod = box;
    });
}

function closeModProvincias(){
    window.addEvent('domready', function() {
        $('boxModificarProvincia_'+ delboxMod).innerHTML = '';
        delboxMod = 0;
    });
}


function modProvincia(codigo){
    window.addEvent('domready', function() {
       
        provincia    = $('txtModNombreProvincia').value;
        
        var req = new Request({
            method: 'get',
            url: 'modulos/clientes/provincias/modProvincias.php',
            data: { 'codigo': codigo,
                    'provincia' : provincia},
            onComplete: function(response) {
                $('boxModificarProvincia_'+ delboxMod).innerHTML = '';
                delboxMod = 0;
                
                searchProvincias('')
            }
        }).send();
    });
}



function delProvincia(delId){
    if(confirm("esta seguro que quiere borrarlo?")){
        window.addEvent('domready', function() {
            var req = new Request({
                method: 'get',
                url: 'modulos/clientes/provincias/delProvincia.php',
                data: { 'codProvincia' : delId },
                onComplete: function(response) {
                    searchProvincias('');
                }
            }).send();
        });
    }
}