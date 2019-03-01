@extends('layouts.app')

@section('title', 'Barraca')

@section('conteudo')
    <!-- Main - Corpo do painel -->
    <main>
      <div class="container">
        <div class="cadastrar shadow"> <!-- Cadastrar -->
          <h4 class="border-bot">Barraca</h4>
          <form name="formBarraca" class="mt-3" action="" method="POST">
            <div class="row">
              <div class="col">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" placeholder="Nome da barraca" maxlength="60">
                <div id="nome"></div><!--Msg Erro-->
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 mt-3">
                <label for="semestre">Semestre</label>
                <select name="semestre" class="form-control" id="semestres">
                  <option value="" disabled selected>Selecione uma opção...</option>
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
                <div id="semestre"></div><!--Msg Erro-->
              </div>
              <div class="col-sm-6 mt-3">
                <label for="periodo">Periodo</label>
                <select name="periodo" class="form-control" id="periodos">
                  <option value="" disabled selected>Selecione uma opção...</option>
                  <option value="mat">Matutino</option>
                  <option value="vesp">Vespertino</option>
                  <option value="not">Noturno</option>
                </select>
                <div id="periodo"></div><!--Msg Erro-->                
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 mt-3">
                <label>Curso</label>
                <select name="curso" class="form-control" id="periodos">
                  <option value="" disabled="" selected="">Selecione uma opção...</option>
                  @foreach($cursosListagem as $curso)
                  <option value="{{$curso->id}}">{{$curso->nome}}</option>
                  @endforeach
                </select>
                <div id="curso"></div><!--Msg Erro-->                
              </div>
              <div class="col-sm-6 mt-3">
                <label for="pagamento">Tipo de pagamento</label>
                <select name="pagamento" class="form-control" id="pagamento">
                  <option value="" disabled selected>Selecione uma opção...</option>
                  <option value="dinheiro">Dinheiro</option>
                  <option value="credito">Cartão Crédito</option>
                  <option value="debito">Cartão Débito</option>
                </select>
                <div id="pagamento"></div><!--Msg Erro-->                
              </div>
            </div>
            <button type="submit" class="btn btn-default btn-md btn-block mt-4" onclick="return validarBarraca()">Salvar</button>
          </form>
        </div>
      </div> 
    </main>

@endsection