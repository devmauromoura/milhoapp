@extends('layouts.app')

@section('title', 'MilhoAPP - Home')

@section('conteudo')
    <!-- Main - Corpo do painel -->
    <div class="container mt-3">
      <div class="row justify-content-md-center">
        <div class="cadastrar col-sm-5 mb-3 pb-2">
            <h4 class="headerRank pl-3 mb-3">Top 5 Barracas</h4>
            <ul class="list-unstyled">
              @foreach($votosBarraca as $barracas)
              <li class="media listaRank mb-2">
                <img src="{{asset($barracas->nomeimagem)}}" height="85px" width="85px" class="mr-4" alt="Logo Barraca">    
                <div class="media-body">
                  @if($countVotos === 0)
                  <h4 class="mt-0 mb-1">Não existem votos</h4>
                  <h5 class="mt-0 mb-1">registrados!</h5>
                  @else
                  <h4 class="mt-0 mb-1">{{$barracas->nome}}</h4>
                  <h5 class="mt-0 mb-1">{{$barracas->Votos}} Votos</h5>
                  @endif
                </div>
              @endforeach
            </ul>
        </div>
      </div>
      @if($nivelUser != 1)
      @else
      <div class="row justify-content-md-center">
        <div class="cadastrar col-sm-5 mb-5 pb-2">
            <h4 class="headerRank pl-3 mb-3">Seus Dados</h4>
            <ul class="list-unstyled">
              <li class="media listaRank mb-2">
                <img src="{{asset($dadosBarraca->nomeimagem)}}" height="85px" width="85px" class="mr-4" alt="Logo Barraca">    
                <div class="media-body">
                  <h4 class="mt-0 mb-1">{{$dadosBarraca->nome}}</h4>
                  <h5 class="mt-0 mb-1"> {{$seusVotos}} Votos</h5>
                </div>
              @endif
            </ul>
        </div>
      </div>
    </div>
    <!-- Main - FIM-->
    @endsection
