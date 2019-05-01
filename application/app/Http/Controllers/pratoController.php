<?php

namespace MilhoAPP\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\View;
use MilhoAPP\Pratos;
use MilhoAPP\Barraca;

class pratoController extends Controller
{
    public function show(){

        $idBarraca = barraca::select('id')->where('idUser', Auth::id())->first(); 
        $idBarracaString = $idBarraca['id'];
        $listPratos = Pratos::where('idBarraca', $idBarracaString)->get();

        return view::make('pratos')->with(compact('listPratos'));
    }

    public function create(Request $request){
        $dadosPrato = $request->only(['nomePrato','descPrato', 'valorPrato']);
        $addPrato = new Pratos;
        $addPrato->nome = $dadosPrato['nomePrato'];
        $addPrato->descricao = $dadosPrato['descPrato'];
        $valordopratao = str_replace(',', '.', $dadosPrato['valorPrato']);
        $addPrato->valor = $valordopratao;
        $idBarraca = barraca::select('id')->where('idUser', Auth::id())->first(); 
        $idBarracaString = $idBarraca['id'];
        $addPrato->idbarraca = $idBarracaString;
        $addPrato->save();

        return redirect()->route('pratos');;
    }

    public function atualizarPrato(Request $request){
        $dadosPrato = $request->all();
        
        $pratoUpdate =  Pratos::find($request->codigoPrato);
        $pratoUpdate->nome = $request->nome;
        $pratoUpdate->descricao = $request->desc;
        $pratoUpdate->valor = str_replace(',', '.', $request->valor);
        $pratoUpdate->save();
        
        
        return redirect('pratos');
    }

    public function removerPrato($id){
        $pratoDelete = Pratos::find($id);
        $pratoDelete->delete();

        return redirect('pratos');
    }


    /*
    ########################################################################################################
                                    Controller dos PRATOS para API                  
    ########################################################################################################
    */

    public function showAll(){
        $pratosApi = Pratos::all();

        return response()->json($pratosApi);
    }


}
