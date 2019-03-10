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
        $dataUltimoVoto = Voto::select('created_at')->where('idbarraca','=',$dadosVoto['idBarraca'])->orderBy('created_at','desc')->first();
        $user = Auth::user();

        $dataAtual = date("Y-m-d h:i:s");

        if($dataUltimoVoto < $dataAtual){
            $voto = new Voto;
            $voto->idusuario = $user->id;
            $voto->idbarraca = $dadosVoto['idBarraca'];
            $voto->created_at = date("Y-m-d h:i:s");
            $voto->save();
    
            return response()->json(['Mensagem'=>'Voto registrado com sucesso!']); 
        }else{
            return response()->json(['Mensagem'=>'Limite máximo de voto alcançado. Você pode votar uma vez por barraca a cada dia.']);
        }
    

        // return response()->json([
        //  'User que esta votando' => $user->id,
        //   'Dados enviados' => $dadosVoto,
        //   'data' => $dataUltimoVoto
        // ]);
    }
}
