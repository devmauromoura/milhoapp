<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Barraca;

class barracaController extends Controller
{
    public function show(){

        $idUser = Auth()->User()->id;
        $barracaCad = DB::table('barraca')->where('idUser', $idUser)->count();
        //return $barracaCad;

        $cursosListagem = DB::table('curso')->get();
        $dadosBarraca = DB::table('barraca')->where('idUser', $idUser)->leftJoin('curso','idCurso','=','curso.id')->select(DB::raw('barraca.nome, barraca.semestre, barraca.periodo, barraca.idcurso, barraca.pagamento, curso.nome AS cnome'))->get();
        //view::make('barraca')->with(compact('cursosListagem'));

        //return $dadosBarraca;

        if ($barracaCad == 0){
            return "<h3>Não existe barraca vinculada a seu usuário.</h3><br>Entre em contato com a turma de ADS.";
        }else{
                return view::make('barraca')->with(compact('cursosListagem'))->with(compact('dadosBarraca'));
        }
    }

    public function update(Request $request){
        $dadosBarracaUpdate = $request->only(['nome','curso','periodo','semestre','pagamento']);
        //return $dadosBarracaUpdate;

         DB::table('barraca')->where('idUser', Auth::id())->update([
            'nome' => $dadosBarracaUpdate['nome'],
            'idCurso' => $dadosBarracaUpdate['curso'],
            'periodo' => $dadosBarracaUpdate['periodo'],
            'semestre' => $dadosBarracaUpdate['semestre'],
            'pagamento' => $dadosBarracaUpdate['pagamento']
        ]);

        return redirect()->route('showBarracas');
         }
}
