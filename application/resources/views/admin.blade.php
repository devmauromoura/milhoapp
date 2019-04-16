@extends('layouts.app')
@section('title', 'AdminPage')
@section('conteudo')
    <!-- Main - Corpo do painel -->
    <div class="container">
      <div class="cadastrar">
        <h4 class="border-bot">Cadastrar</h4>
        <div class="row">
          <div class="col-sm-3">
            <button type="button" class="btn btn-default btn-md btn-block mt-3" data-toggle="modal" data-target="#modalUsuario">Usuário</button>    
          </div>
          <div class="col-sm-3">
            <button type="button" class="btn btn-default btn-md btn-block mt-3" data-toggle="modal" data-target="#modalCurso">Curso</button>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div>
    </div>

    <div class="container"> <!-- Listar -->
      <div class="listar-adm shadow">
        <div class="border-bot">
          <div class="row">
            <div class="col-sm-6">
              <h4>Usuários</h4>
            </div>
            <div class="col-sm-6">
              <input class="form-control" id="buscaUsuario" type="search" placeholder="Procurar usuários" aria-label="Search">
            </div>
          </div>
        </div>
          <div class="table-responsive mt-3">
          <table class="table table-sm" id="tabelaUsuario">
              <thead class="thead-light">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Nivel</th>
                  <th scope="col">Ativo</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                  @foreach($usuarios as $user)                
                <tr>
                  <th scope="row">{{$user->id}}</th>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->nivel}}</td>
                  <td>
                    @if ($user->ativo == 1)
                    <i class="far fa-check-circle"></i>
                    @else
                    <i class="fas fa-ban" style="color: red"></i>
                    @endif
                  </td>
                  <td><a href="#" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fas fa-edit mr-2"></i></a> </td>
                  <td><a href="#" data-toggle="modal" data-target="#removerUsuario"><i class="fas fa-trash-alt mr-2"></i></a></td>
                  <td><a href="#" data-toggle="modal" data-target="#emailUsuario"><i class="fas fa-envelope"></i></a></td>
                </tr>
                @endforeach
              </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="container"> <!-- Listar -->
      <div class="listar-adm shadow">
        <div class="border-bot">
          <div class="row">
            <div class="col-sm-6">
              <h4>Cursos</h4>
            </div>
            <div class="col-sm-6">
              <input class="form-control" type="search" placeholder="Procurar cursos" aria-label="Search">
            </div>
          </div>
        </div>
          <div class="table-responsive mt-3">
          <table class="table table-sm">
              <thead class="thead-light">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($todosC as $curso)
                <tr>
                  <th scope="row">{{$curso->id}}</th>
                  <td>{{$curso->nome}}</td>
                  <td><a href="#" data-toggle="modal" data-target="#removerCurso"><i class="fas fa-trash-alt mr-2"></i></a></td>
                </tr>
                @endforeach
              </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="container"> <!-- Listar -->
      <div class="listar-adm shadow mb-5">
        <div class="border-bot">
          <div class="row">
            <div class="col-sm-6">
              <h4>Barracas</h4>
            </div>
            <div class="col-sm-6">
              <input class="form-control" type="search" placeholder="Procurar barracas" aria-label="Search">
            </div>
          </div>
        </div>
          <div class="table-responsive mt-3">
          <table class="table table-sm">
              <thead class="thead-light">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Barraca</th>
                  <th scope="col">Curso</th>
                </tr>
              </thead>
              <tbody>
                @foreach($barracas as $barra)                
                <tr>
                  <th scope="row">{{$barra->id}}</th>
                  <td>{{$barra->nome}}</td>
                  <td>{{$barra->cnome}}</td>
                </tr>
                @endforeach
              </tbody>
          </table>
        </div>
      </div>
    </div>



    <!-- Modal Cadastrar Usuario -->
    <div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cadastrar Usuário</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form name="cadastrarUsuario" id="cadastrarUsuario" action="usuario/create" method="POST">
                @csrf
                <div class="row">
                  <div class="col">
                    <label>Nome</label>
                    <input name="name" type="text" class="form-control" placeholder="Nome do usuário" maxlength="60">
                  </div>
                </div>
                <div class="row">
                  <div class="col mt-3">
                    <label>E-mail</label>
                    <input name="email" type="text" class="form-control" placeholder="email@email.com.br" maxlength="60">
                  </div>
                </div>
                <div class="row">
                  <div class="col mt-3">
                    <label for="nivel">Nivel</label>
                    <select name="nivel" class="form-control" id="nivel">
                      <option value="" disabled selected></option>
                      <option value="1">1 - Web User</option>
                      <option value="2">2 - App User</option>
                      <option value="3">3 - Admin User</option>
                    </select>
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
    <!-- Modal Cadastrar Usuario - FIM -->

    <!-- Modal Cadastrar Curso -->
    <div class="modal fade" id="modalCurso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cadastrar Curso</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form name="cadastrarCurso" id="cadastrarCurso" action="curso/create" method="POST">
                @csrf
                <div class="row">
                  <div class="col">
                    <label>Nome do curso</label>
                    <input name="nomeCurso" type="text" class="form-control" placeholder="Nome do curso" maxlength="60">
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
    <!-- Modal Cadastrar Usuario - FIM -->

    <!-- Modal Editar Usuario -->
    <div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Usuário</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form name="editarUsuario" id="editarUsuario" action="/usuario/update" method="POST">
                <div class="row">
                  <div class="col">
                    <label>Nome</label>
                    <input name="nome" type="text" class="form-control" placeholder="Nome do usuário" maxlength="60">
                  </div>
                </div>
                <div class="row">
                  <div class="col mt-3">
                    <label>E-mail</label>
                    <input name="email" type="text" class="form-control" placeholder="email@email.com.br" maxlength="60">
                  </div>
                </div>
                <div class="row">
                  <div class="col mt-3">
                    <label for="nivel">Nivel</label>
                    <select name="nivel" class="form-control" id="nivel">
                      <option value="" disabled selected></option>
                      <option value="1">1 - Web User</option>
                      <option value="2">2 - App User</option>
                      <option value="3">3 - Admin User</option>
                    </select>
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
    <!-- Modal Editar Usuario - FIM -->

    <!-- Modal Remover Usuario -->
    <div class="modal fade" id="removerUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Remover Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Deseja remover este usuario?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-block mt-4 ml-2" data-dismiss="modal">Não</button>
            <a href="#" class="btn btn-default btn-block mt-4 ml-2">Sim</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Remover Usuario - FIM -->

    <!-- Modal E-mail Usuario -->
    <div class="modal fade" id="emailUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            O e-mail chegara em breve!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal E-mail Usuario - FIM -->

    <!-- Modal Remover Curso -->
    <div class="modal fade" id="removerCurso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Remover Curso</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Deseja remover este curso?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-block mt-4 ml-2" data-dismiss="modal">Não</button>
            <a href="#" class="btn btn-default btn-block mt-4 ml-2">Sim</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Remover Curso - FIM -->
@endsection
