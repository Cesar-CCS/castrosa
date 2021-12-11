$('document').ready(function () {

    $('#botonAceptar').click(botonIniciarSesion);
    
    $('#inputPassword').keypress(function(e) {
            if (e.keyCode == 13 ) { botonIniciarSesion(); }
    });
    
    
    function botonIniciarSesion() {
    
        var vLog = $('#inputLogin').val();
        var vPas = $('#inputPassword').val();
    
        $.post('php/Login.php', {Login:vLog,Password:vPas}, function(ret) {
    
            if (ret['resultado'] != 0) {
                console.log('login incorrecto');
                alert("Credenciales Incorrectas");
                $(location).attr('href',"loggin.html");
            }
            else {
                alert("Bienvenido "+ vLog);
                $(location).attr('href',"Formulario.html");
                
            }
        },'json');
    
    }});
    