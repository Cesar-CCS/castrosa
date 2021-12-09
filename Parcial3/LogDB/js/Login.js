$('document').ready(function () {

    $('#botonAceptar').click(botonIniciarSesion);
    
    $('#inputPassword').keypress(function(e) {
            if (e.keyCode == 13 ) { botonIniciarSesion(); }
    });
    
    
    function botonIniciarSesion() {
    
        var vLog = $('#inputLogin').val();
        var vPas = $('#inputPassword').val();
    
        $.post('php/Login.php', {Login:vLog,Password:vPas}, function(ret) {
    
            //console.log(ret);
            if (ret['resultado'] != 0) {
                console.log('login incorrecto');

            }
            else {
                //console.log('login correcto');
    
                //console.log(ret);
                $(location).attr('href',"Formulario.html");
                
            }
        },'json');
    
    }});
    