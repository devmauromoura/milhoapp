@extends('layouts.app')
@section('title', 'MilhoAPP - Bebidas')
@section('conteudo')

    <!-- Main - Corpo do painel -->
    <main>
      <div class="container">
        <div class="cadastrar shadow"> <!-- Cadastrar -->
          <h4 class="border-bot">Cadastrar Bebida</h4>
          <form name="cadastrarBebida" id="cadastrarBebida" class="mt-3" action="/public/bebidas/create" method="POST">
            @csrf
            <div class="row">
              <div class="col">
                <label>Nome da bebida</label>
                <input name="nomeBebida" type="text" class="form-control" placeholder="Ex: Refrigerante lata" maxlength="60">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 mt-3">
                <label>Descrição da bebida</label>
                <input name="descBebida" type="text" class="form-control" placeholder="Ex: Coca-cola" maxlength="60">
              </div>
              <div class="col-sm-6 mt-3">
                <label>Valor</label>
                <input name="valorBebida" name="dinheiro" type="text" class="dinheiro form-control" placeholder="R$0,00">
              </div>
            </div>
            <button type="submit" class="btn btn-default btn-md btn-block mt-4">Cadastrar</button>
          </form>
        </div>
      </div> 

      <div class="container"> <!-- Listar -->
        <div class="listar shadow">
            <h4 class="border-bot">Bebidas</h4>
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
                @foreach($listBebidas as $bebidas)                  
                  <tr>
                    <th scope="row">{{$bebidas->id}}</th>
                    <td>{{$bebidas->nome}}</td>
                    <td>{{$bebidas->descricao}}</td>
                    <td>{{$bebidas->valor}}</td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#modalEditarBebida"><i class="fas fa-edit mb-2 mr-2"></i></a>
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
    <div class="modal fade" id="modalEditarBebida" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Alterar Bebida</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form name="alterarBebida" id="editarBebida" action="/bebidas/update" method="POST">
                @crsf
                <div class="row">
                  <div class="col">
                    <label>Nome da Bebida</label>
                    <input name="nome" type="text" class="form-control" placeholder="Ex: Refrigerante lata" maxlength="60">
                    <div id="errNomeBebidaModal"></div><!--Msg Erro-->
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6 mt-3">
                    <label>Descrição da Bebida</label>
                    <input name="desc" type="text" class="form-control" placeholder="Ex: Coca-Cola" maxlength="60">
                    <div id="errDescBebidaModal"></div><!--Msg Erro-->
                  </div>
                  <div class="col-sm-6 mt-3">
                    <label>Valor</label>
                    <input name="valor" type="text" class="dinheiro form-control" placeholder="R$0,00">
                    <div id="errValorBebidaModal"></div><!--Msg Erro-->
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
            <h5 class="modal-title" id="exampleModalLabel">Excluir Bebida</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Deseja excluir sua bebida?
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