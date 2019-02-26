<!DOCTYPE html>
<html lang="pt-br">
    
<head>
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="img/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmação de E-mail</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .container {
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }
        .box {
            width: 600px;
            background: #fff;
            border: 1px solid #6C7A89;
            border-radius: 20px;
        }
        .border-bot {
            border-bottom: 2px solid #00c853; 
            padding-bottom: 5px;
            margin-left: 15px;
            margin-right: 15px;
        }
        .alert {
            margin-top: 5px;
            padding: 0px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="box">
            <h4 class="p-3 border-bot">Olá, participante</h4>
            <p class="p-3">Para concluirmos o cadastramento, digite abaixo a nova senha para acessar a central do MilhoAPP.</p>
            <form name="confirmaEmailForm" action="/public/cadastrarSenha/{{$id}}/aplicar" method="POST">
                @csrf
                <div class="input-group input-group-lg mt-4 pr-5 pl-5 pt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="text" name="passwordNew" class="form-control" placeholder="Nova senha" aria-describedby="basic-addon1">
                </div>
                <div id="newSenha"></div><!--Msg Erro-->
                <div class="input-group input-group-lg mt-4 pr-5 pl-5 pt-1">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="text" name="passwordNewConfirm" class="form-control" placeholder="Confirmar senha" aria-describedby="basic-addon1">
                </div>
                <div id="newSenhaConfirm"></div><!--Msg Erro-->
                <div class="col-sm-12 pr-5 pl-5 pt-4 mb-4">
                    <button type="submit" class="btn btn-success btn-lg btn-block" onclick="return validaNewSenha()">Confirmar</button>
                </div>
                <div class="p-3 text-center">
                    <p>Você sera direcionado a pagina de entrada de nossa central.</p>
                    <p>Duvidas <br> <b>contato@contato.com.br</b></p>
                </div>
            </form>                
        </div>
    </div>
    <script>
        function validaNewSenha() {
            var senha = confirmaEmailForm.newSenha.value;
            var corfirmarSenha = confirmaEmailForm.newSenhaConfirm.value;
                
            if (senha == "") {
                document.getElementById('newSenha').className = "alert alert-danger mr-5 ml-5";
                document.getElementById('newSenha').innerHTML = "Favor preencher a senha";
                document.getElementById('newSenha').style.display = 'block'; 
            }else if (nome.length < 4) {
                document.getElementById('newSenha').className = "alert alert-danger mr-5 ml-5";
                document.getElementById('newSenha').innerHTML = "Favor preencher a senha com no minimo 4 caracteres";
                document.getElementById('newSenha').style.display = 'block';
            }else {
                document.getElementById('newSenha').style.display = 'none';
            }
            if (corfirmarSenha == "") {
                document.getElementById('newSenhaConfirm').className = "alert alert-danger mr-5 ml-5";
                document.getElementById('newSenhaConfirm').innerHTML = "Campo confirmar senha deve ter o mesmo valor de senha";
                document.getElementById('newSenhaConfirm').style.display = 'block';
                return false;
            }else {
                document.getElementById('newSenhaConfirm').style.display = 'none';
            }
        }
    </script>   
</body>
</html>