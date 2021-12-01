$('document').ready(function () {
    $('#BtnEntrar').click(IniciarSesion);
    $('#Pass').keypress(function(e) {
            if (e.keyCode == 13 ) { IniciarSesion(); }
    });

    function IniciarSesion() {
        console.log('iniciar sesion');
        var Usser = $('#Uss').val();
        var Passw = $('#Pass').val();
    
            if (Usser == 'Cesar' && Passw=='1590') 
            {
                $.get("php/login.php", {Usuario: Usser,Contra: Passw});
                $(location).attr('href',"Formulario/Index.html");

            }
            else {
                console.log('login incorrecto');
            }
    }});