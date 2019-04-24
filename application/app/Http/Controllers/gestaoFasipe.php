<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Barraca;

class gestaoFasipe extends Controller
{
    public function index(){
        return Barraca::all();
    }

    public function barraca($id){
        $buscaBarraca = Barraca::find($id);
         return $buscaBarraca;
    }

    public function enviarNotas(Request $request){
        $dados = $request->all();
        $votoFasipe = new Barraca;
        $votoFasipe->vendaingresso = $dados['vendaingresso'];
        $votoFasipe->dadosaplicativo = $dados['dadosaplicativo'];
        $votoFasipe->workshop = $dados['workshop'];
        $votoFasipe->reuniaovigilancia = $dados['reuniaovigilancia'];
        $votoFasipe->save();
        return redirect()->back()->with('Alert','Voto(s) inserido(s) com sucesso!');
    }
}
