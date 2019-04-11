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


    <meta charset="utf-8">
    <title>MilhoAPP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
  </head>

  <body>
    <div class="container">
      <div class="box shadow">

        <div class="row box-header">
          <div class="col-sm-12">
            <img class="mx-auto d-block logo mb-4" src="img/Logo.png" alt="Logo">
          </div>
        </div>

        <form name="login" id="login" action="/public/loginUser" method="POST">
          @csrf
          <div class="row">
            <div class="col">
              <div class="input-group input-group-lg mt-4 pr-4 pl-4 pt-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="iconEmail"><i class="fas fa-user"></i></span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="E-mail" aria-describedby="iconEmail">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="input-group input-group-lg pr-4 pl-4 mt-5">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="iconSenha"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" name="password" class="form-control" placeholder="Senha" aria-describedby="iconSenha">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 pr-5 pl-5 pt-5">
                <button type="submit" class="btn btn-success btn-lg btn-block">Acessar</button>
            </div>
          </div>

        </form>

        <div class="row box-bottom">
            <div class="col-sm-12 text-center">
              <p><b>Desenvolvido pela turma de ADS<br>5º SEMESTRE</b></p>
            </div>
          </div>

      </div>
    </div>

    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/localization/messages_pt_BR.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
  </body>
</html>
