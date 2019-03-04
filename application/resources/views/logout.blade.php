@extends('layouts.app')
@section('title', 'MilhoAPP - Logout')
@section('conteudo')
    <main role="main">

      <section class="container logout text-center">
        <div class="container">
          <h1 class="jumbotron-heading"><img src="img/Logo.png" height="120px"></h1>
          <br>
          <p class="lead text-muted">Aplicação desenvolvida pela turma de análise e desenvolvimento de sistemas - FASIPE 2019</p>
          <p>
            <a href="/public" class="btn btn-default my-2">Acessar Novamente </a>
          </p>
        </div>
      </section>
    </main>
@endsection