<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MilhoAPP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    *{
        font-family: "montserrat",sans-serif;
        margin: 20px;
    }
    .mail {
        height: 560px;
        width: 550px; 
    }
    .mail-head {
        background-color: #00c853;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }
    .mail-body {
        border-left: 1px solid black;
        border-right: 1px solid black;
    }
    .mail-footer {
        background-color: #00c853;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
    }
    .btn {
        background-color: #00c853;
        border: none;
    }
    .btn:hover {
        background-color: #00e676;
    }
    </style>
</head>
<body>
    <div class="mail text-center">
        <div class="row mail-head">
            <div class="col">
                <h2>Informativo MilhoAPP</h2>
            </div>
        </div>
        <div class="row mail-body">
            <div class="col">
                <p>Olá, seu cadastro foi realizado com sucesso.</p>
                <p>Cadastre sua senha de acesso através do link a seguir!</p>
            </div>
         
        
            <div class="col">
                <a ahref="http://localhost/public/cadastrarSenha/{{ $id }}" type="button" class="btn btn-primary btn-lg btn-block">Cadastrar senha</a>
            </div>
        
      
            <div class="col">
                <p>Equipe MilhoAPP</p>
                <p>Contato.: email@email.com</p>
            </div>
        </div>
        <div class="row mail-footer">
            <div class="col">
                Não responda este e-mail, o mesmo não é monitorado.
            </div>
        </div> 
    </div>
    
    
</body>
</html>