<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<fieldset>
    <legend>Cursos Cadastrados</legend>
	<table id="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Curso</th>
				<th>+</th>
				<th>+</th>
			</tr>
		</thead>
		@foreach($todosC as $c)
		<tbody>
			<td>{{$c->id}}</td>
			<td >{{$c->nome}}</td>
			<td><button>Edit</button></td>
			<td><a href="curso/{{$c->id}}/delete">Delete</a></td>								
		</tbody>
		@endforeach
	</table>
	</fieldset>
	<form action="curso/create" method="POST">
		@csrf
  		<fieldset>
    		<legend>Cadastrar Novo</legend>
    			Id: <input type="text" id="cursoId" disabled><br>
			    Nome: <input type="text" name="nomeCurso" id="cursoNome"><br>
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
                   document.getElementById("cursoId").value = this.cells[0].innerHTML;
                   document.getElementById("cursoNome").value = this.cells[1].innerHTML;
                 };
             }
         }
         selectedRowToInput();
     </script>
</body>
</html>