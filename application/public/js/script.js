window.onload=function(){
    //Busca usuario
    var filtro = document.getElementById('buscaUsuario');
    var tabela = document.getElementById('tabelaUsuario');
    filtro.onkeyup = function() {
        var nomeFiltro = filtro.value;
        for (var i = 1; i < tabela.rows.length; i++) {
            var conteudoCelula = tabela.rows[i].cells[1].innerText;
            var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
            tabela.rows[i].style.display = corresponde ? '' : 'none';
        }
    };

    //Busca curso
    var filtroCurso = document.getElementById('buscaCurso');
    var tabelaCurso = document.getElementById('tabelaCurso');
    filtroCurso.onkeyup = function() {
        var nomeFiltro = filtroCurso.value;
        for (var i = 1; i < tabelaCurso.rows.length; i++) {
            var conteudoCelula = tabelaCurso.rows[i].cells[1].innerText;
            var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
            tabelaCurso.rows[i].style.display = corresponde ? '' : 'none';
        }
    };

    //para barraca
    var filtroBarraca = document.getElementById('buscaBarraca');
    var tabelaBarraca = document.getElementById('tabelaBarraca');
    filtroBarraca.onkeyup = function() {
        var nomeFiltro = filtroBarraca.value;
        for (var i = 1; i < tabelaBarraca.rows.length; i++) {
            var conteudoCelula = tabelaBarraca.rows[i].cells[1].innerText;
            var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
            tabelaBarraca.rows[i].style.display = corresponde ? '' : 'none';
        }
    };
}


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