<?php

namespace MilhoAPP\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use MilhoAPP\Barraca;
use MilhoAPP\Bebida;
use MilhoAPP\Pratos;
use MilhoAPP\Curso;
use MilhoAPP\Voto;
use Validator;

class votoController extends Controller
{
    public function registrarVoto(Request $request){
        
        $validator = Validator::make($request->all(), [
            "idBarraca" => "required|integer",
        ]);

        if ($validator->fails()) {
            return response()->json(['Mensagem'=>'Envie os dados corretamente.'],403);
        }else{ 
         
            $dadosVoto = $request->all();
            $user = Auth::user();
            if($user->ativo == 1){
                $dataUltimoVoto = Voto::select('created_at')->where('idusuario','=',$user->id)->where('idbarraca','=',$dadosVoto['idBarraca'])->orderBy('created_at','desc')->first();
        

                $dataAtual = date("Y-m-d");
    
                if($dataUltimoVoto['created_at'] < $dataAtual){
                    $voto = new Voto;
                    $voto->idusuario = $user->id;
                    $voto->idbarraca = $dadosVoto['idBarraca'];
                    $voto->created_at = date("Y-m-d");
                    $voto->save();
            
                    return response()->json(['Mensagem'=>'Voto registrado com sucesso!'],200); 
                }else{
                    return response()->json(['Mensagem'=>'Limite máximo de voto alcançado. Você pode votar uma vez por barraca a cada dia.','Data Atual'=> $dataAtual,'Ultimo Voto'=>$dataUltimoVoto['created_at']],403);
                }
            }else{
                return response()->json(['Mensagem'=>'O cadastro precisa estar ativo. Verifique seu email.'],401); 
            }
        }
    

        // return response()->json([
        //  'User que esta votando' => $user->id,
        //   'Dados enviados' => $dadosVoto,
        //   'data' => $dataUltimoVoto
        // ]);
    }
}
