$(document).ready( function() {

    $("#botonAjax").click(presionBoton);
    
    
    function presionBoton() {
        var grado = $("#gradF").val();
    
        $.get("Conversor.php", {gradF: grado}, llegadaDatos);
        //return false;
    }
    
    function llegadaDatos(datos) {
        $('#resultado').html('<h3>La conversion de Farenheit a Centigrados es: '+datos+'</h3>');
    }
    
    });
    