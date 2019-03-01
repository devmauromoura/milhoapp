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

        return redirect('/');
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

}
	