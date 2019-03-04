@extends('layouts.app')

@section('title', 'MilhoAPP - Barraca')

@section('conteudo')
    <!-- Main - Corpo do painel -->
    <main>
      <div class="container">
        <div class="cadastrar shadow"> <!-- Cadastrar -->
          <h4 class="border-bot">Barraca</h4>
          <form name="cadastrarBarraca" id="cadastrarBarraca" class="mt-3" action="barraca/update" method="POST">
            @csrf
            @foreach($dadosBarraca as $dados)
            <div class="row">
              <div class="col">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" value="{{$dados->nome}}" vplaceholder="Nome da barraca" maxlength="60">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 mt-3">
                <label for="semestre">Semestre</label>
                <select name="semestre" class="form-control" id="semestres">
                  <option value="{{$dados->semestre}}" disabled selected>{{$dados->semestre}}</option>
                  <option value="1">1º</option>
                  <option value="2">2º</option>
                  <option value="3">3º</option>
                  <option value="4">4º</option>
                  <option value="5">5º</option>
                  <option value="6">6º</option>
                  <option value="7">7º</option>
                  <option value="8">8º</option>
                  <option value="9">9º</option>
                  <option value="10">10º</option>
                </select>
              </div>
              <div class="col-sm-6 mt-3">
                <label for="periodos">Periodo</label>
                <select name="periodo" class="form-control" id="periodos">
                  <option value="{{$dados->periodo}}" disabled selected>{{$dados->periodo}}</option>
                  <option value="Matutino">Matutino</option>
                  <option value="Vespertino">Vespertino</option>
                  <option value="Noturno">Noturno</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 mt-3">
                <label for="cursos">Curso</label>
                <select name="curso" class="form-control" id="curso">
                  <option value="{{$dados->idcurso}}" disabled selected>{{$dados->cnome}}</option>
                  @foreach($cursosListagem as $curso)
                  <option value="{{$curso->id}}">{{$curso->nome}}</option>
                  @endforeach                  
                </select>
              </div>
              <div class="col-sm-6 mt-3">
                <label for="pagamentos">Tipo de pagamento</label>
                <select name="pagamento" class="form-control" id="pagamentos">
                  <option value="{{$dados->pagamento}}" disabled selected>{{$dados->pagamento}}</option>
                  <option value="dinheiro">Dinheiro</option>
                  <option value="credito">Cartão Crédito</option>
                  <option value="debito">Cartão Débito</option>
                </select>
              </div>
            </div>
            <button type="submit" class="btn btn-default btn-md btn-block mt-4">Salvar</button>
          @endforeach
          </form>
        </div>
      </div> 
    </main>
    <!-- Main - FIM -->
    @endsection
