<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barraca;
use App\Pratos;
use App\Bebida;

use DB;

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
}
