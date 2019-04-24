<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Barraca;
use App\gestaoVotosFasipe;

class gestaoFasipe extends Controller
{
    public function index(){
        return Barraca::all();

        //Deverá ser listado a Barraca e seus pontos individuas, assim como um totalizador.
    }

    public function barraca($id){
        $buscaBarraca = Barraca::find($id);
         return $buscaBarraca;
    }

    public function enviarNotas(Request $request){
        $dados = $request->all();
        $votoFasipe = new gestaoVotosFasipe;
        $votoFasipe->vendaingresso = $dados['vendaingresso'];
        $votoFasipe->dadosaplicativo = $dados['dadosaplicativo'];
        $votoFasipe->workshop = $dados['workshop'];
        $votoFasipe->reuniaovigilancia = $dados['reuniaovigilancia'];
        $votoFasipe->idbarraca = $dados['idbarraca'];
        $votoFasipe->idusuario = Auth::user(id);
        $votoFasipe->save();
        return redirect()->back()->with('Alert','Voto(s) inserido(s) com sucesso!');
    }
}
