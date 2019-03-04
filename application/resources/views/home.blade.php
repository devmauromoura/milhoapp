@extends('layouts.app')

@section('title', 'MilhoAPP - Home')

@section('conteudo')
    <!-- Main - Corpo do painel -->
    <div class="container mt-5">
      <div class="row">
        <div class="col-sm-6 mb-5">
            <h4 class="border-bot">Top 5 Pratos</h4>
            <div id="topPratos" style="height: 350px; "></div>
        </div>
        <div class="col-sm-6 mb-5">
            <h4 class="border-bot">Top 5 Bebidas</h4>
            <div id="topBebidas" style="height: 350px; "></div>
        </div>
      </div>

      <div class="col-md-6 offset-md-3 mb-5">
          <h4 class="border-bot">Top 5 Barracas</h4>
          <div id="chartContainer" style="height: 300px; width: 100%;"></div>
      </div>

    </div>
    <!-- Main - FIM-->
    @endsection
