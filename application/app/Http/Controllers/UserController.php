<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Mail\cadastroUsuario;
use App\User;

class UserController extends Controller
{

    /*
    ########################################################################################################
                                    Checagem de autenticação através de rotas default
                                    como http://localhost.com/ > "/"                        
    ########################################################################################################
    */

    public function ini(){
        if (Auth::check()){
            return redirect()->intended('home');
        }
        else{
            return view::make('index');
        }
    }


     /*
    ########################################################################################################
                                    Função para checar se as credenciais são validas
                                    se forem, o mesmo é enviado a home.  
    ########################################################################################################
    */

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

    /*
    ########################################################################################################
                                    Desconectar // Logout                       
    ########################################################################################################
    */
    public function logout(){
        Auth::logout();

        return redirect()->route('sair');
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

    /*
    ########################################################################################################
                                    Funções para a API                      
    ########################################################################################################
    */

    public function apiLogin(Request $request){
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            $user = Auth::user();
            $token = $user->createToken('milhoAPP')->accessToken;

            return response()->json(['Mensagem' => 'Login Realizado com Sucesso', 'Token: ' => 'Bearer '.$token], 200);
        }
        else{
            return response()->json(['Fail'=>'Sem Acesso']);
        }
    }

    public function apiRegister(Request $request){
            $dadosRequest =  $request->all();

            $userApi = new User;
            $userApi->name = $dadosRequest['nome'];
            $userApi->password = $dadosRequest['password'];
            $userApi->email = $dadosRequest['email'];
            $userApi->nivel = 2;
            $userApi->save();

            $token = $userApi->createToken('milhoAPP')->accessToken;

            return response()->json(['Mensagem' => 'Cadastro Realizado com Sucesso', 'Token: ' => 'Bearer '.$token], 200);

            //return response()->json($dadosRequest);
    }

    public function getUser(){
        $user = Auth::user(); 
        return response()->json($user); 
    }

}
	