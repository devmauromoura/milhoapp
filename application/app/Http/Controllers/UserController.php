<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use App\Mail\cadastroUsuario;
use App\User;
use DB;


class UserController extends Controller
{

    // Validação de acesso a rota principal "/"

    public function ini(){
        if (Auth::check()){
            return redirect()->intended('home');
        }
        else{
            return view::make('index');
        }
    }

    //Validação de crenciais ao utilizar o FORM de Login

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('home');
        }
        else{
            return 'validacao fail';
        }
    }

    //Deslogar
    public function logout(){
        Auth::logout();

        return redirect('/');
    }



    //Funções para listagem de dados na página do ADM
    public function show(){
    	$usuarios = DB::table('users')->get();
        $todosC = DB::table('curso')->get();
        $barracas = DB::table('barraca')->leftJoin('curso', 'barraca.idcurso','=','curso.id')->select(DB::raw('barraca.id, barraca.nome, curso.nome AS cnome'))->get();

    	return view::make('/admin')->with(compact('usuarios'))->with(compact('todosC'))->with(compact('barracas'));
    }

    public function select($){
        
    }

    // Cadastrar Usuário
    public function create(Request $requestCreate){

        $user = User::where('email', '=', $requestCreate->input('email'))->first();
        if($user == null){
           $userNew = new User;
           $userNew->name = $requestCreate->input('name');
           $userNew->email = $requestCreate->input('email');
           $userNew->save();
            
           $userCheck = User::where('email', '=', $requestCreate->input('email'))->first();
           $id = $userCheck->id;
        
            Mail::to($requestCreate->input('email'))->send(new cadastroUsuario($id));  // Para testar as configurações -> dd(config('mail'));
                        
            return 'O usuário foi cadastrado. Id.: '.$userCheck->id."<br>Foi encaminhado ao e-mail ".$requestCreate->input('email')." um link para update da senha!";
        }else{
            return "O email ".$requestCreate->input('email')." já está cadastrado! Os emails de acesso podem ser utilizados/cadastrados apenas uma vez. ";
        }
    }
 
    public function delete($id)
    {
    	$userDel = User::find($id);
    	$userDel->delete();

    	//return $id;

    	Return redirect('/usuario');
    }

    public function cadastrarSenha($id){
        return view::make('cadastrarSenha')->with(compact('id'));
    }

    public function salvarSenha(Request $request, $id){

        $pass = Hash::make($request->input('passwordNew'));
        $passC = User::find($id);
        $passC->password = $pass;

        $passC->save();



        return redirect('/');
    }

    public function criarsenha(){
        $retorno = Hash::make('12345');

        return $retorno;
    }
}
	