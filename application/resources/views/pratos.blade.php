@extends('layouts.app')

@section('title', 'Pratos')

@section('conteudo')

    <!-- Main - Corpo do painel -->
    <main>
      <div class="container">
        <div class="cadastrar shadow"> <!-- Cadastrar -->
          <h4>Cadastrar Prato</h4>
          <form action="/public/pratos/cadastrar" method="POST">
          @csrf
            <div class="row">
              <div class="col">
                <label>Nome do prato</label>
                <input type="text" name="nomePrato" class="form-control" placeholder="Ex: Bolo de milho">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 mt-3">
                <label>Descrição do prato</label>
                <input type="text" name="descPrato" class="form-control" placeholder="Ex: Creme de milho">
              </div>
              <div class="col-sm-6 mt-3">
                <label>Valor</label>
                <input type="text" name="valorPrato" class="form-control" placeholder="R$0,00">
              </div>
            </div>
            <button type="submit" class="btn btn-default btn-md btn-block mt-4">Cadastrar</button>
          </form>
        </div>
      </div> 

      <div class="container"> <!-- Listar -->
        <div class="listar shadow">
            <h4>Pratos</h4>
            <table class="table table-sm">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Valor</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($listPratos as $pratos)
                  <tr>
                    <th scope="row">{{$pratos->id}}</th>
                    <td>{{$pratos->nome}}</td>
                    <td>{{$pratos->descricao}}</td>
                    <td>{{$pratos->valor}}</td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#modalEditar"><i class="fas fa-edit mb-2 mr-2"></i></a>
                        <a href="#" data-toggle="modal" data-target="#modalExcluir"><i class="fas fa-trash-alt"></i></a>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
      </div> 
    </main>
    <!-- Main - FIM -->

    <!-- Modal Editar -->
    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Alterar Prato</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="" method="POST">
                <div class="row">
                  <div class="col">
                    <label>Nome do prato</label>
                    <input type="text" class="form-control" placeholder="Ex: Bolo de milho">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6 mt-3">
                    <label>Descrição do prato</label>
                    <input type="text" class="form-control" placeholder="Ex: Creme de milho">
                  </div>
                  <div class="col-sm-6 mt-3">
                    <label>Valor</label>
                    <input type="text" class="form-control" placeholder="R$0,00">
                  </div>
                </div>
                <button type="button" class="btn btn-danger mt-4" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-default mt-4">Salvar</button>
              </form>    
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Editar - FIM -->

    <!-- Modal Excluir -->
    <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Excluir Prato</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Deseja excluir seu prato?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-block mt-4 ml-2" data-dismiss="modal">Não</button>
            <a href="#" class="btn btn-default btn-block mt-4 ml-2">Sim</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Excluir - FIM -->


@endsection