<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="apple-touch-icon" sizes="57x57" href="img\apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img\apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img\apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img\apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img\apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img\apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img\apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img\apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img\apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="img/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img\favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img\favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img\favicon-16x16.png">
    <link rel="manifest" href="img\manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img\ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css">
  </head>

  <body>
    <!-- Menu - Fixo -->
    <div class="header shadow">
      <img src="img\Logo.png" alt="" class="logo">
      <input type="checkbox" id="chk">
      <label for="chk" class="show-menu-btn">
        <i class="fas fa-ellipsis-h"></i>
      </label>

      <ul class="menu">
        <a href="/public/home">Home</a>
        <a href="/public/barraca">Barraca</a>
        <a href="/public/pratos">Pratos</a>
        <a href="/public/bebidas">Bebidas</a>
        <a href="/public/logout">Sair</a>
        <label for="chk" class="hide-menu-btn">
          <i class="fas fa-times"></i>
        </label>
      </ul>
    </div>
    <!-- Menu - FIM -->