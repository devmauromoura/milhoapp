<?php

namespace MilhoAPP\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use MilhoAPP\Mail\cadastroUsuario;
use MilhoAPP\User;
use Validator;
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
            if(Auth::User()->nivel == 3){
                return redirect()->intended('admin');                
            }else{
                return redirect()->intended('home');
            }
        }
        else{
            return redirect()->back()->with('alert', 'Usuário/Senha incorreto!');
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

        if($passC->nivel != 2){
            $passC->password = $pass;
            $passC->ativo = 1;
    
            $passC->save();
            return redirect('/');
        }else{
            
            $passC->password = $pass;
            $passC->ativo = 1;
            $passC->save();

            return "<h2><center>Senha cadastrada com sucesso!<br>Realize o acesso ao APP.</center></h2>";
        }
    }

    /*
    ########################################################################################################
                                    Funções para a API
    ########################################################################################################
    */

    public function apiLogin(Request $request){
        $validator = Validator::make($request->all(), [
            "email" => "required",
            "password"  => "required",
        ]);

        if ($validator->fails()) {
            return response()->json(['Mensagem'=>'Envie os dados corretamente.']);
        }else{        

            if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
                $user = Auth::user();
                $token = $user->createToken('milhoAPP')->accessToken;

                return response()->json(['Mensagem' => 'Login Realizado com Sucesso', 'token' => $token,'Aluno' => $user->aluno], 200);
            }
            else{
                return response()->json(['Mensagem'=>'Dados Incorretos'], 401);
            }
        }    
    }

    public function apiRegister(Request $request){
        $validator = Validator::make($request->all(), [
            "name" => "required|string",
            "email" => "required|email|unique:users",
            "telefone" => "required|min:9|numeric",
        ]);
        
        if ($validator->fails()) {
            return response()->json(['Mensagem'=>'Envie os dados corretamente.'], 422);
        }else{

            $consulta = User::where('email',$request['email'])->first();

            if($consulta != NULL){
                return response()->json(['Mensagem'=>'Email ja cadastrado']);
            }else{
            
                $dadosRequest =  $request->all();

                 $userApi = new User;
                 $userApi->name = $dadosRequest['name'];
                 $userApi->email = $dadosRequest['email'];
                 $userApi->telefone = $dadosRequest['telefone'];
                 $userApi->nivel = 2;
                 $userApi->save();

                //$token = $userApi->createToken('milhoAPP')->accessToken;
                
                $userCheck = User::where('email', '=', $dadosRequest['email'])->first();
                $id = $userCheck->id;
                
                Mail::to($dadosRequest['email'])->send(new cadastroUsuario($id));
                
                return response()->json(['Mensagem' => 'Cadastro Realizado com Sucesso, verifique seu email.'], 200);

                //return response()->json($dadosRequest);   
            }        
        } 
    }


    public function registrarAluno(Request $request){
        $validator = Validator::make($request->all(), [
            "aluno" => "required|max:1|numeric",
        ]);
        if ($validator->fails()) {
            return response()->json(['Mensagem'=>'Envie os dados corretamente.'], 401);
        }else{
            $user = Auth::user();
            $aluno =  $request['aluno'];
            
            $user->aluno = $aluno;
            $user->save();

            return response()->json(['Mensagem' => 'Alteracao relizada com sucesso'], 200);
            
        }
    }

    public function getUser(){
        $user = Auth::user();

        return response()->json(['Retorno'=>$user]);
    }

    public function apiLogout(){
     
        return response()->json('Teste Logout');
    }

}
