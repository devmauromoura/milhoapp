<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Curso;

class cursoController extends Controller
{
	public function show(){
		$todosC = DB::table('curso')->get();
		return view::make('admin')->with(compact('todosC'));
	}

	public function create(Request $request){
		//$nomeCurso = $request->input('nomeCurso');

		//return "O nome do curso a ser cadastrado é:".$nomeCurso;

		$Curso = new Curso;
		$Curso->nome =  $request->nomeCurso;
		$Curso->save();

		return redirect('/admin');

		//return $request->input('nomeCurso');
	}

	public function delete($id){
		$curDel = Curso::find($id);
    	$curDel->delete();
    	
    	//return $id;

    	return redirect('/admin');
	}
}
