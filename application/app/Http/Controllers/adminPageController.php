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
use App\Barraca;




class adminPageController extends Controller
{
        public function show(){
        
            if (Auth::user()->nivel == 3) {
                $usuarios = DB::table('users')->get();
                $todosC = DB::table('curso')->get();
                $barracas = DB::table('barraca')->leftJoin('curso', 'barraca.idcurso','=','curso.id')->select(DB::raw('barraca.id, barraca.nome, curso.nome AS cnome'))->get();
        
                return view::make('/admin')->with(compact('usuarios'))->with(compact('todosC'))->with(compact('barracas'));
            }else{
                return redirect('home');
            }

    }

     /*
    ########################################################################################################
                                    Manipulação dos Usuários                       
    ########################################################################################################
    */
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
            
            $barracaNew = new Barraca;
            $barracaNew->nome = $userNew->name;
            $barracaNew->idUser = $userCheck->id;
            $barracaNew->idCurso = 1;
            $barracaNew->save();
            
            return redirect()->back()->with("alert", "O usuário foi cadastrado. Foi encaminhado ao e-mail ".$requestCreate->input('email')." um link para update da senha!");
        }else{
            return redirect()->back()->with("alert", "O ".$requestCreate->input('email')." ja foi cadastrado!");
        }
    }
 
        public function update(Request $requestUpdate){
            $userUpdate = User::find($requestUpdate['codigo']);
            $userUpdate->name = $requestUpdate['nome'];
            $userUpdate->email = $requestUpdate['email'];
            $userUpdate->nivel = $requestUpdate['nivel'];
            $userUpdate->update();
            return redirect('admin');
        }
    
    public function delete($id)
    {
    	$userDel = User::find($id);
    	$userDel->delete();

    	//return $id;

    	return redirect('/usuario');
    }

    public function resendMail($id, $email){
        Mail::to($email)->send(new cadastroUsuario($id));  // Para testar as configurações -> dd(config('mail'));

        //return "Email: ".$email." Id: ".$id;

        return redirect()->back()->with("alert", "O email foi reenviado para ".$email);
    }

}
