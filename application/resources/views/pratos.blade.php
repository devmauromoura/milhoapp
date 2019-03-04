@extends('layouts.app')

@section('title', 'MilhoAPP - Pratos')

@section('conteudo')

<!-- Main - Corpo do painel -->
    <main>
      <div class="container">
        <div class="cadastrar shadow"> <!-- Cadastrar -->
          <h4 class="border-bot">Cadastrar Prato</h4>
          <form name="cadastrarPrato" id="cadastrarPrato" class="mt-3" action="/public/pratos/cadastrar" method="POST">
            @csrf
            <div class="row">
              <div class="col">
                <label>Nome do prato</label>
                <input name="nomePrato" type="text" class="form-control" placeholder="Ex: Milho Assado" maxlength="60">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 mt-3">
                <label>Descrição do prato</label>
                <input name="descPrato" type="text" class="form-control" placeholder="Ex: Milho temperado assado na churrasqueira" maxlength="60">
              </div>
              <div class="col-sm-6 mt-3">
                <label>Valor</label>
                <input name="valorPrato" type="text" class="form-control dinheiro" placeholder="R$0,00">
              </div>
            </div>
            <button type="submit" class="btn btn-default btn-md btn-block mt-4">Cadastrar</button>
          </form>
        </div>
      </div> 

      <div class="container"> <!-- Listar -->
        <div class="listar shadow">
            <h4 class="border-bot">Pratos</h4>
            <div class="table-responsive mt-3">
            <table class="table table-sm">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th></th>
                    <th></th>
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
                      <a href="#" data-toggle="modal" data-target="#modalEditarPrato"><i class="fas fa-edit mb-2 mr-2"></i></a>
                    </td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#modalExcluir"><i class="fas fa-trash-alt"></i></a>
                    </td>
                  </tr>
                  @endforeach                  
                </tbody>
            </table>
          </div>
        </div>
      </div> 
    </main>
    <!-- Main - FIM -->

    <!-- Modal Editar -->
    <div class="modal fade" id="modalEditarPrato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Alterar Prato</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form name="editarPrato" id="editarPrato" action="" method="POST">
                <div class="row">
                  <div class="col">
                    <label>Nome do prato</label>
                    <input name="nome" type="text" class="form-control" placeholder="Ex: Bolo de milho" maxlength="60">
                    <div id="errNomePratoModal"></div><!--Msg Erro-->
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6 mt-3">
                    <label>Descrição do prato</label>
                    <input name="desc" type="text" class="form-control" placeholder="Ex: Creme de milho" maxlength="60">
                    <div id="errDescPratoModal"></div><!--Msg Erro-->
                  </div>
                  <div class="col-sm-6 mt-3">
                    <label for="dinheiro">Valor</label>
                    <input name="valor" id="dinheiro" name="dinheiro" type="text" class="form-control dinheiro" placeholder="R$0,00">
                    <div id="errValorPratoModal"></div><!--Msg Erro-->
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <button type="submit" class="btn btn-default btn-block mt-4">Salvar</button>
                  </div>
                  <div class="col-sm-6">
                    <button type="button" class="btn btn-danger btn-block mt-4" data-dismiss="modal">Fechar</button>
                  </div>
                </div>
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