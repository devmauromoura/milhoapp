<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Barraca;
use App\Bebida;
use App\Pratos;
Use App\Curso;
Use App\Voto;



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
        $votos = Voto::select('idbarraca','nome',DB::raw('count(idbarraca) AS Votos'))->leftJoin('barraca','voto.idbarraca','=','barraca.id')->groupBy('idbarraca','barraca.nome')->get();

        return response()->json($votos);
    }
}
