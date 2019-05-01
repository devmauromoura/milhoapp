<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use compact;
use App\Barraca;
use App\Bebida;
use App\Pratos;
Use App\Curso;
Use App\Voto;
use App\User;
use Illuminate\Support\Facades\Auth;


class dashController extends Controller
{
    public function getItemApi(){
        return response()->json([
            'Barracas' => Barraca::all(['id','nome','semestre','periodo','pagamento']),
            'Bebidas' => Bebida::all(['id','nome','descricao','valor','idbarraca']),
            'Pratos' => Pratos::all(['id','nome','descricao','valor','idbarraca']),
            'Cursos' => Curso::all(['id','nome'])
        ]);
    }

    public function votacao(){
        // Listagem de todas as barracas e seus votos.
        $votos = Voto::select('idbarraca','nome',DB::raw('count(idbarraca) AS Votos'))->leftJoin('barraca','voto.idbarraca','=','barraca.id')->groupBy('idbarraca','barraca.nome')->get();

        return response()->json($votos);
    }

    public function homeShow(){
        // Listagem das 5 barracas mais votadas.
        $votosBarraca = Voto::select('idbarraca','nome','nomeimagem',DB::raw('count(idbarraca) AS Votos'))->leftJoin('barraca','voto.idbarraca','=','barraca.id')->groupBy('idbarraca','barraca.nome','nomeimagem')->orderBy('Votos','desc')->limit(5)->get();
        $dadosBarraca = Barraca::where('idUser', Auth::user()->id)->first();
        $seusVotos = Voto::select('idbarraca')->leftJoin('barraca','barraca.id','=','idbarraca')->where('idUser', Auth::user()->id)->count();
        $countVotos = Voto::all()->count();
        $nivelUser = Auth::user()->nivel;

       return view::make('home')->with(compact('votosBarraca'))->with(compact('countVotos'))->with(compact('dadosBarraca'))->with(compact('seusVotos'))->with(compact('nivelUser'));


        //return $dadosBarraca;
    }
}
