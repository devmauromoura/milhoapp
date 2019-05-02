<?php

namespace MilhoAPP\Http\Controllers;

use Illuminate\Http\Request;
use MilhoAPP\Barraca;
use MilhoAPP\Pratos;
use MilhoAPP\Bebida;
use Validator;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Socialite;
use MilhoAPP\User;

class ApiController extends Controller
{
    public function barracaShow(){
      
      $dadosBarraca = Barraca::leftJoin('curso','idCurso','=','curso.id')->select(DB::raw('barraca.id ,barraca.nome, barraca.semestre, barraca.periodo, barraca.idcurso, barraca.localizacao, curso.nome AS cnome,barraca.nomeimagem'))->get();
      return response()->json(['message'=>'True','Retorno'=>$dadosBarraca]);
    
    }

    public function pratoShow(){
      $dadosPrato = Pratos::all();

      return response()->json(['Msg'=>'True','Retorno'=>$dadosPrato]);
    }

    public function bebidaShow(){
      $dadosBebida = Bebida::all();

      return response()->json(['Msg'=>'True','Retorno'=>$dadosBebida]);
    }

    public function pratoBarraca($id){
      $idBarraca =  $id;
      $pratoCount = Pratos::where('idbarraca','=',$idBarraca)->count();
      $retornoPrato = Pratos::where('idbarraca','=',$idBarraca)->get();

      if($pratoCount != 0){
        return response()->json(['Msg'=>'True','Retorno'=>$retornoPrato]);
      }else{
        return response()->json(['Msg'=>'True','Retorno'=>'Não existem pratos para essa barraca!']);
      }

    }

    public function bebidaBarraca($id){
      $idBarraca =  $id;
      $bebidaCount = Bebida::where('idbarraca','=',$idBarraca)->count();
      $retornoBebida = Bebida::where('idbarraca','=',$idBarraca)->get();

      if($bebidaCount != 0){
        return response()->json(['Msg'=>'True','Retorno'=>$retornoBebida]);
      }else{
        return response()->json(['Msg'=>'True','Retorno'=>'Não existem bebidas para essa barraca!']);
      }

    }
    
  public function validaFbAccess($token){
    if($token == null){
      return response()->json(['Mensagem'=>'Envie o Token Access']);
    }else{
      $tokenFacebook = Socialite::driver('facebook')->userFromToken($token);
      $email = $tokenFacebook->email; 
      $valida = User::where('email', $email)->count();

      if($valida === 0){
        $newUser = new User;
        $newUser->name = $tokenFacebook->name; 
        $newUser->email = $tokenFacebook->email; 
        $newUser->password = Hash::make('12345');
        $newUser->nivel = 2;
        $newUser->ativo = 1;
        $newUser->save();
        $token = $newUser->createToken('milhoAPP')->accessToken;
        return response()->json(['Mensagem'=>'Cadastro realizado','Token'=>$token]);
      }else{
        $dadosUser = User::where('email', $email)->first();
        
        //return dd($senhaUser['password']);
        Auth::login($dadosUser);
        $token = $dadosUser->createToken('milhoAPP')->accessToken;
        return response()->json(['Mensagem' => 'Login Realizado com Sucesso', 'token' => $token], 200);
      }
    }
  }
}
