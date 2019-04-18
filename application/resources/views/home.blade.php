@extends('layouts.app')

@section('title', 'MilhoAPP - Home')

@section('conteudo')
    <!-- Main - Corpo do painel -->
    <div class="container mt-3">
      <div class="row justify-content-md-center">
        <div class="cadastrar col-sm-5 mb-5 pb-2">
            <h4 class="headerRank pl-3 mb-3">Top 5 Barracas</h4>
            <ul class="list-unstyled">
              @foreach($votosBarraca as $barracas)
              <li class="media listaRank mb-2">
                <img src="{{ asset('barracas/'.$barracas->nomeimagem) }}" height="85px" class="mr-4" alt="...">
                <div class="media-body">
                  <h4 class="mt-0 mb-1">{{$barracas->nome}}</h4>
                  <h5 class="mt-0 mb-1">{{$barracas->Votos}} Votos</h5>
                </div>
              </li>
              @endforeach
            </ul>
        </div>
      </div>
    </div>
    <!-- Main - FIM-->
    @endsection
