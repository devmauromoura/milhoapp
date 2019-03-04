<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\View;
use App\Pratos;
use App\Barraca;

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
        $addPrato->valor = $dadosPrato['valorPrato'];
        $idBarraca = barraca::select('id')->where('idUser', Auth::id())->first(); 
        $idBarracaString = $idBarraca['id'];
        $addPrato->idbarraca = $idBarracaString;
        $addPrato->save();

        return redirect()->route('pratos');;
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
