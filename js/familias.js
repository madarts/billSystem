function searchFamilias(e){
    window.addEvent('domready', function() {
        var req = new Request({
            method: 'get',
            url: 'modulos/articulos/familias/searchFamilias.php',
            data: { 'search' : e.value },
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

function openAddBoxSub(box){
    window.addEvent('domready', function() {
        $('boxSubFamilia_'+ box).setStyle("display", 'block');
    });
}

function openModBox(box){
    window.addEvent('domready', function() {
        $('boxModFamilia_'+ box).setStyle("display", 'block');
    });
}

function openModBoxSub(box){
    window.addEvent('domready', function() {
        $('boxModSubFamilia_'+ box).setStyle("display", 'block');
    });
}

function closeAddBox(){
    window.addEvent('domready', function() {
        $$('.stlAddBox').setStyle("display", 'none');
    });
}

function closeAddBoxSub(box){
    window.addEvent('domready', function() {
        $('boxSubFamilia_'+ box).setStyle("display", 'none');
    });
}

function closeModBox(box){
    window.addEvent('domready', function() {
        $('boxModFamilia_'+ box).setStyle("display", 'none');
    });
}

function closeModBoxSub(box){
    window.addEvent('domready', function() {
        $('boxModSubFamilia_'+ box).setStyle("display", 'none');
    });
}



function addFamilia(){
    window.addEvent('domready', function() {
        nombre = $('txtAddNombre').value;
        web = $('slcAddWeb').value;
        
        var req = new Request({
            method: 'get',
            url: 'modulos/articulos/familias/addFamilia.php',
            data: { 'nombre' : nombre, 'web' : web },
            onComplete: function(response) {
                $('txtBuscarFamilia').value = nombre;
                
                var req2 = new Request({
                    method: 'get',
                    url: 'modulos/articulos/familias/searchFamilias.php',
                    data: { 'search' : nombre },
                    onComplete: function(response) {
                        $$('.stlAddBox').setStyle("display", 'none');
                        
                        $('tablaDatos').innerHTML = response;
                    }
                }).send();
            }
        }).send();
    });
}

function addSubfamilia(box, codigo){
    window.addEvent('domready', function() {
        nombre = $('txtAddNombreSub_'+ box).value;
        web = $('slcAddWebSub_'+ box).value;
        beneficios = $('txtAddBeneficiosSub_'+ box).value;
        
        var req = new Request({
            method: 'get',
            url: 'modulos/articulos/familias/addSubFamilia.php',
            data: { 'codigo' : codigo, 'nombre' : nombre, 'web': web, 'beneficios': beneficios },
            onComplete: function(response) {
                $('txtBuscarFamilia').value = nombre;
                
                var req2 = new Request({
                    method: 'get',
                    url: 'modulos/articulos/familias/searchFamilias.php',
                    data: { 'search' : nombre },
                    onComplete: function(response) {
                        $$('.stlAddBox').setStyle("display", 'none');
                        
                        $('tablaDatos').innerHTML = response;
                    }
                }).send();
            }
        }).send();
    });
}

function modFamilia(box, id){
    nombre = $('txtModNombre_'+ box).value;
    web = $('slcModWeb_'+ box).value;
    
    var req = new Request({
        method: 'get',
        url: 'modulos/articulos/familias/modFamilia.php',
        data: { 'id' : id, 'nombre' : nombre, 'web' : web },
        onComplete: function(response) {
            var req2 = new Request({
                method: 'get',
                url: 'modulos/articulos/familias/searchFamilias.php',
                data: { 'search' : $('txtBuscarFamilia').value },
                onComplete: function(response) {
                    $$('.stlAddBox').setStyle("display", 'none');
                    
                    $('tablaDatos').innerHTML = response;
                }
            }).send();
        }
    }).send();
}

function modSubFamilia(box, id){
    nombre = $('txtModNombreSub_'+ box).value;
    web = $('slcModWebSub_'+ box).value;
    beneficios = $('txtModBeneficiosSub_'+ box).value;
    
    var req = new Request({
        method: 'get',
        url: 'modulos/articulos/familias/modSubFamilia.php',
        data: { 'id' : id, 'nombre' : nombre, 'web' : web, 'beneficios' : beneficios },
        onComplete: function(response) {
            var req2 = new Request({
                method: 'get',
                url: 'modulos/articulos/familias/searchFamilias.php',
                data: { 'search' : $('txtBuscarFamilia').value },
                onComplete: function(response) {
                    $$('.stlAddBox').setStyle("display", 'none');
                    
                    $('tablaDatos').innerHTML = response;
                }
            }).send();
        }
    }).send();
}

function delFamilia(codigo){
    if(confirm("esta seguro que quiere borrarlo?")){
        var req = new Request({
            method: 'get',
            url: 'modulos/articulos/familias/delFamilia.php',
            data: { 'codigo' : codigo },
            onComplete: function(response) {
                $('txtBuscarFamilia').value = '';
                
                var req2 = new Request({
                    method: 'get',
                    url: 'modulos/articulos/familias/searchFamilias.php',
                    data: { 'search' : '' },
                    onComplete: function(response) {
                        $$('.stlAddBox').setStyle("display", 'none');
                        
                        $('tablaDatos').innerHTML = response;
                    }
                }).send();
            }
        }).send();
    }
}


function delSubFamilia(codigo){
    if(confirm("esta seguro que quiere borrarlo?")){
        var req = new Request({
            method: 'get',
            url: 'modulos/articulos/familias/delSubFamilia.php',
            data: { 'codigo' : codigo },
            onComplete: function(response) {
                var req2 = new Request({
                    method: 'get',
                    url: 'modulos/articulos/familias/searchFamilias.php',
                    data: { 'search' : $('txtBuscarFamilia').value },
                    onComplete: function(response) {
                        $$('.stlAddBox').setStyle("display", 'none');
                        
                        $('tablaDatos').innerHTML = response;
                    }
                }).send();
            }
        }).send();
    }
}
