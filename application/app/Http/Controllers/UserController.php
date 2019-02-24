<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
Use DB;
Use App\User;

class UserController extends Controller
{
    public function show(){
    	$usuarios = DB::table('users')->get();
        $todosC = DB::table('curso')->get();
        $barracas = DB::table('barraca')->leftJoin('curso', 'barraca.idcurso','=','curso.id')->select(DB::raw('barraca.id, barraca.nome, curso.nome AS cnome'))->get();

    	return view::make('/admin')->with(compact('usuarios'))->with(compact('todosC'))->with(compact('barracas'));
    }

    public function create(Request $requestCreate){

    	$userNew = new User;
    	$userNew->name = $requestCreate->input('name');
    	$userNew->email = $requestCreate->input('email');
    	$userNew->password = bcrypt($requestCreate->input('password'));
    	
    	//echo $userNew->name."<br>".$userNew->email."<br>".$userNew->password;

    	$userNew->save();

    	Return redirect('/usuario');
    }

    public function delete($id)
    {
    	$userDel = User::find($id);
    	$userDel->delete();

    	//return $id;

    	Return redirect('/usuario');
    }


}
	