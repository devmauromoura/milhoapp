$(document).ready(function(){
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    });

    $(function() {
        $('.dinheiro').mask('#.##0,00', {reverse: true});
    });

    $("#cadastrarUsuario").validate({
        rules:{
            nome: {
                required: true,
                maxlength: 100,
                minlength: 5,
            },
            email: {
                required: true,
                email: true
            },
            nivel: {
                required: true,
            },
        }
    })

    $("#cadastrarCurso").validate({
        rules:{
            curso: {
                required: true,
                maxlength: 100,
                minlength: 3,
            }
        }
    })

    $("#editarUsuario").validate({
        rules:{
            nome: {
                required: true,
                maxlength: 100,
                minlength: 5,
            },
            email: {
                required: true,
                email: true
            },
            nivel: {
                required: true,
            },
        }
    })

    $("#cadastrarBarraca").validate({
        rules:{
            nome: {
                required: true,
                maxlength: 100,
                minlength: 5,
            },
            semestre: {
                required: true,
            },
            periodo: {
                required: true,
            },
            curso: {
                required: true,
            },
            pagamento: {
                required: true,
            },
        }
    })

    $("#cadastrarPrato").validate({
        rules:{
            nome: {
                required: true,
                maxlength: 100,
                minlength: 5,
            },
            desc: {
                required: true,
                maxlength: 100,
                minlength: 5,
            },
            valor: {
                required: true,
            },
        }
    })

    $("#editarPrato").validate({
        rules:{
            nome: {
                required: true,
                maxlength: 100,
                minlength: 5,
            },
            desc: {
                required: true,
                maxlength: 100,
                minlength: 5,
            },
            valor: {
                required: true,
            },
        }
    })

    $("#cadastrarBebida").validate({
        rules:{
            nome: {
                required: true,
                maxlength: 100,
                minlength: 5,
            },
            desc: {
                required: true,
                maxlength: 100,
                minlength: 5,
            },
            valor: {
                required: true,
            },
        }
    })

    $("#editarBebida").validate({
        rules:{
            nome: {
                required: true,
                maxlength: 100,
                minlength: 5,
            },
            desc: {
                required: true,
                maxlength: 100,
                minlength: 5,
            },
            valor: {
                required: true,
            },
        }
    })

    $("#login").validate({
        rules:{
            email: {
                required: true,
                email: true,
            },
            senha: {
                required: true,
                minlength: 5,
            },
        }
    })

})