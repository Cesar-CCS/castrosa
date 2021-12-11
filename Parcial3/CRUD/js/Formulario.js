$('document').ready(function () {

    

    $("#btnNuevo").click(function () {
        $('input').val('');
        $('#btnNuevo').prop("disabled", true);
        $('#btnRegistrar').prop("disabled", false);
        $('#btnEliminar').prop("disabled", true);

        $('.form-control').prop("disabled", false);
        $("#N_Docente").focus();
    });

    $("#btnLimpiar").click(function () {
        $('input').val('');
        $('.form-control').prop("disabled", true);
        $('#id_Curso').prop("disabled", false);
        $('#btnNuevo').prop("disabled", false);
        $('#btnRegistrar').prop("disabled", true);
        $('#btnEliminar').prop("disabled", false);
    });

    $("#btnRegistrar").click(function () {
        var vnom_doc = $('#N_Docente').val();
        var vap = $('#Apellido').val();
        var vnom_curs = $('#N_Curso').val();
        var vcost = $('#Costo').val();
        var vcatego = $('#Categoria').val();
        var vemail = $('#Correo').val();
        var vrequi = $('#Requisitos').val();
        var vdescrip = $('#Descripcion').val();

        $.post('php/grabar.php',
                {nom_doc: vnom_doc, app: vap, nom_cur: vnom_curs, cost: vcost, cate: vcatego, email: vemail, requi: vrequi, desc: vdescrip},
                function (ret) {

                if (ret['resultado'] != 0) {

                console.log('Error Insercion');
                alert('ERROR INSERCION');
                }
                else {

                $('#idUsuario').val(ret['detalle']);
                alert('INSERCION REALIZADA');
                $('#btnNuevo').prop("disabled", false);    
                $('#btnRegistrar').prop("disabled", true);    
                $('#btnEliminar').prop("disabled", false); 
            }
        },'json');

        $('.form-control').prop("disabled", true);
        $('#btnNuevo').prop("disabled",true);
        $('#btnRegistrar').prop("disabled",false);
        $('#btnEliminar').prop("disabled",true);
        $("#N_Docente").focus();
    });

    $('#btnEliminar').click( function() {
        var vID = $('#id_Curso').val();

        if (confirm('Desea eliminar el curso con ID: '+vID)) {
            $.post('php/eliminar.php',
            {id: vID},
            function(ret) {
                alert("Curso Eliminado");
            }, 'json');
            alert("Curso Eliminado: ID "+vID);
            $('input').val('');
            $('.form-control').prop("disabled", true);
            $('#btnNuevo').prop("disabled", false);
            $('#btnRegistrar').prop("disabled", true);
            $('#btnEliminar').prop("disabled", true);
        }else {
            alert("Eliminacion Cancelada");
        }
    });

    $("#btnConsultar").click(function () {
        var vID = $('#id_Curso').val();

        $.post('php/consulta.php',
                {id: vID},
                function(ret) {
                console.log('regreso de php');
                if (ret['resultado'] != 0) {

                console.log('Error Insercion');
                alert('ERROR CONSULTA');
                }
                else {
                console.log(ret);
                $('#N_Docente').val(ret.detalle.Nombre_Docente);
                $('#Apellido').val(ret.detalle.Apellido);
                $('#N_Curso').val(ret.detalle.Nombre_Curso);
                $('#Costo').val(ret.detalle.Costo);
                $('#Correo').val(ret.detalle.Correo);
                $('#Categoria').val(ret.detalle.Categoria);
                $('#Requisitos').val(ret.detalle.Requisitos);
                $('#Descripcion').val(ret.detalle.Descripcion);

                alert('CONSULTA REALIZADA');
                $('input').prop("disabled", false);
                $('#id_Curso').prop("disabled", true);
                $('#btnNuevo').prop("disabled", false);
                $('#btnRegistrar').prop("disabled", true);    
                $('#btnEliminar').prop("disabled", false);
                $('#btnEditar').prop("disabled", false); 
            }
        },'json');
    });    

    $("#btnEditar").click(function () {
        var vID = $('#id_Curso').val();
        var vnom_doc = $('#N_Docente').val();
        var vap = $('#Apellido').val();
        var vnom_curs = $('#N_Curso').val();
        var vcost = $('#Costo').val();
        var vcatego = $('#Categoria').val();
        var vemail = $('#Correo').val();
        var vrequi = $('#Requisitos').val();
        var vdescrip = $('#Descripcion').val();

        $.post('php/modificar.php',
                {idC: vID, nom_doce: vnom_doc, appe: vap, nom_curs: vnom_curs, cos: vcost, catego: vcatego, mail: vemail, req: vrequi, des: vdescrip},
                function(ret) {
                console.log('regreso de php');
                if (ret['resultado'] != 0) {

                console.log('Error modificar');
                alert('ERROR AL MODIFICAR');
                }
                else {
                console.log(ret);

                alert('MODIFICACION REALIZADA');
                $('#btnNuevo').prop("disabled", false);
                $('#btnRegistrar').prop("disabled", true);    
                $('#btnEliminar').prop("disabled", false);
                $('#btnEditar').prop("disabled", false); 
            }
        },'json');

    });  

});
