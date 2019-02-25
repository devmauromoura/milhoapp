<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use DB;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\cadastroUsuario;

class UserController extends Controller
{
    public function show(){
    	$usuarios = DB::table('users')->get();
        $todosC = DB::table('curso')->get();
        $barracas = DB::table('barraca')->leftJoin('curso', 'barraca.idcurso','=','curso.id')->select(DB::raw('barraca.id, barraca.nome, curso.nome AS cnome'))->get();

    	return view::make('/admin')->with(compact('usuarios'))->with(compact('todosC'))->with(compact('barracas'));
    }

    public function create(Request $requestCreate){

    	// $userNew = new User;
    	// $userNew->name = $requestCreate->input('name');
    	// $userNew->email = $requestCreate->input('email');
    	// //echo $userNew->name."<br>".$userNew->email."<br>".$userNew->password;
        // $userNew->save();
        Mail::to($requestCreate->input('email'))->send(new cadastroUsuario());
        Return redirect('/admin');
        //return dd(config('mail'));
        //Return '<h4>Notificação</h4><br><p>Email enviado para.: </p><h3>'.$requestCreate->input('email').'</h3>';
    }

    public function delete($id)
    {
    	$userDel = User::find($id);
    	$userDel->delete();

    	//return $id;

    	Return redirect('/usuario');
    }


}
	