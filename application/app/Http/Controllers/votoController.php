<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Barraca;
use App\Bebida;
use App\Pratos;
use App\Curso;
use App\Voto;

class votoController extends Controller
{
    public function registrarVoto(Request $request){
        $dadosVoto = $request->all();
        $user = Auth::user();
        $dataUltimoVoto = Voto::select('created_at')->where('idusuario','=',$user->id)->where('idbarraca','=',$dadosVoto['idBarraca'])->orderBy('created_at','desc')->first();
    

        $dataAtual = date("Y-m-d");

        if($dataUltimoVoto['created_at'] < $dataAtual){
            $voto = new Voto;
            $voto->idusuario = $user->id;
            $voto->idbarraca = $dadosVoto['idBarraca'];
            $voto->created_at = date("Y-m-d");
            $voto->save();
    
            return response()->json(['Mensagem'=>'Voto registrado com sucesso!']); 
        }else{
            return response()->json(['Mensagem'=>'Limite máximo de voto alcançado. Você pode votar uma vez por barraca a cada dia.','Data Atual'=> $dataAtual,'Ultimo Voto'=>$dataUltimoVoto['created_at']]);
        }
    

        // return response()->json([
        //  'User que esta votando' => $user->id,
        //   'Dados enviados' => $dadosVoto,
        //   'data' => $dataUltimoVoto
        // ]);
    }
}
