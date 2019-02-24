@extends('layouts.app')

@section('title', 'Bebidas')

@section('conteudo')

    <!-- Main - Corpo do painel -->
    <main>
      <div class="container">
        <div class="cadastrar shadow"> <!-- Cadastrar -->
          <h4>Novo Usuário</h4>
          <form action="usuario/create" method="POST">
            <div class="row">
              <div class="col">
                <label>Nome</label>
                <input type="text" class="form-control" name="name" placeholder="Insira o nome do Usuário.">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 mt-3">
                <label>E-mail</label>
                <input type="text" class="form-control" name="email" placeholder="Insira o E-mail.">
              </div>
            </div>
            <button type="submit" class="btn btn-default btn-md btn-block mt-4">Cadastrar</button>
          </form>
        </div>
      </div> 

      <div class="container"> <!-- Listar -->
        <div class="listar shadow">
            <h4>Usuários</h4>
            <table class="table table-sm">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Nível</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                @foreach($usuarios as $user)
                <tbody>
                  <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->nivel}}</td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#modalEditar"><i class="fas fa-edit mb-2 mr-2"></i></a>
                        <a href="#" data-toggle="modal" data-target="#modalExcluir"><i class="fas fa-trash-alt mb-2 mr-2"></i></a>
                        <a href="#" data-toggle="modal" data-target="#modalExcluir"><i class="fas fa-envelope"></i></a>
                      </td>
                  </tr>
                </tbody>
                @endforeach                
            </table>
        </div>
      </div> 

      <div class="container">
        <div class="cadastrar shadow"> <!-- Cadastrar Curso -->
          <h4>Novo Curso</h4>
          <form action="curso/create" method="POST">
            @csrf
            <div class="row">
              <div class="col">
                <label>Nome</label>
                <input type="text" class="form-control" name="nomeCurso" placeholder="Insira o nome do Curso!">
              </div>
            </div>
            <button type="submit" class="btn btn-default btn-md btn-block mt-4">Cadastrar</button>
          </form>
        </div>
      </div> 


    </main>
    <!-- Main - FIM -->

    <!-- Modal Editar Usuários -->
    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Alterar Bebida</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="" method="POST">
                <div class="row">
                  <div class="col">
                    <label>Nome</label>
                    <input type="text" class="form-control" id="userId">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6 mt-3">
                    <label>Email</label>
                    <input type="text" class="form-control" id="UserEmail">
                  </div>	
                  <div class="col-sm-6 mt-3">
                    <label>Nivel</label>
                    <input type="text" class="form-control"
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
            <a href="usuario/{{$user->id}}/delete" class="btn btn-default btn-block mt-4 ml-2">Sim</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Excluir - FIM -->

    <script>
             var rIndex,
             table = document.getElementById("table");
         
         function selectedRowToInput()
         {
             
             for(var i = 1; i < table.rows.length; i++)
             {
                 table.rows[i].onclick = function()
                 {
                   // get the seected row index
                   rIndex = this.rowIndex;
                   document.getElementById("userId").value = this.cells[0].innerHTML;
                   document.getElementById("userName").value = this.cells[1].innerHTML;
                   document.getElementById("UserEmail").value = this.cells[2].innerHTML;
                 };
             }
         }
         selectedRowToInput();
     </script>

@endsection