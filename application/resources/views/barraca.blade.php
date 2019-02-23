@extends('layouts.app')

@section('title', 'Barraca')

@section('conteudo')
    <!-- Main - Corpo do painel -->
    <main>
      <div class="container">
        <div class="cadastrar shadow"> <!-- Cadastrar -->
          <h4>Barraca</h4>
          <form action="" method="POST">
            <div class="row">
              <div class="col">
                <label>Nome</label>
                <input type="text" class="form-control" placeholder="Nome da barraca">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 mt-3">
                <label for="semestres">Semestre</label>
                <select class="form-control" id="semestres">
                  <option>1º</option>
                  <option>2º</option>
                  <option>3º</option>
                  <option>4º</option>
                  <option>5º</option>
                  <option>6º</option>
                  <option>7º</option>
                  <option>8º</option>
                  <option>9º</option>
                  <option>10º</option>
                </select>
              </div>
              <div class="col-sm-6 mt-3">
                <label for="periodos">Periodo</label>
                <select class="form-control" id="periodos">
                  <option>Matutino</option>
                  <option>Vespertino</option>
                  <option>Noturno</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 mt-3">
                <label>Curso</label>
                <input type="text" class="form-control" placeholder="Nome do curso">
              </div>
              <div class="col-sm-6 mt-3">
                <label for="pagamentos">Tipo de pagamento</label>
                <select class="form-control" id="pagamentos">
                  <option>Dinheiro</option>
                  <option>Cartão Crédito</option>
                  <option>Cartão Débito</option>
                </select>
              </div>
            </div>
            <button type="submit" class="btn btn-default btn-md btn-block mt-4">Salvar</button>
          </form>
        </div>
      </div> 
    </main>

@endsection