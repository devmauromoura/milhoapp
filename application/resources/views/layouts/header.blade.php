<!DOCTYPE html>
<html lang="pt-br">

  <head>
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
        <a href="/public/">Home</a>
        <a href="/public/barraca">Barraca</a>
        <a href="/public/pratos">Pratos</a>
        <a href="/public/bebidas">Bebidas</a>
        <a href="logout.html">Sair</a>
        <label for="chk" class="hide-menu-btn">
          <i class="fas fa-times"></i>
        </label>
      </ul>
    </div>
    <!-- Menu - FIM -->