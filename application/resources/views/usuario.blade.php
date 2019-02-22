<!DOCTYPE html>
<html>
<head>
	<title>Usuarios</title>

</head>
<body>
	<fieldset>
    <legend>Usuários Cadastrados</legend>
	<table id="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Email</th>
				<th>+</th>
				<th>+</th>
			</tr>
		</thead>
		@foreach($usuarios as $user)
		<tbody>
			<td >{{$user->id}}</td>
			<td >{{$user->name}}</td>
			<td >{{$user->email}}</td>
			<td><button onclick="selectedRowToInput()">Edit</button></td>
			<td><a href="usuario/{{$user->id}}/delete">Delete</a></td>								
		</tbody>
		@endforeach	
	</table>
	</fieldset>
	<form action="usuario/create" method="POST">
		@csrf
  		<fieldset>
    		<legend>Cadastrar Novo</legend>
			    Name: <input type="text" name="name" id="userId"><br>
			    Email: <input type="text" name="email" id="userName"><br>
			    Senha: <input type="password" name="password" id="UserEmail"><br>
			    <button type="submit">Cadastrar</button>
  		</fieldset>
	</form>

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
</body>
</html>