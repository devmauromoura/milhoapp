<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Barraca;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class barracaController extends Controller
{
    
    /*
    ########################################################################################################
                                    Funções para a WEB
    ########################################################################################################
    */
    
    public function show(){

        $idUser = Auth()->User()->id;
        $barracaCad = DB::table('barraca')->where('idUser', $idUser)->count();
        //return $barracaCad;

        $cursosListagem = DB::table('curso')->get();
        $dadosBarraca = DB::table('barraca')->where('idUser', $idUser)->leftJoin('curso','idCurso','=','curso.id')->select(DB::raw('barraca.nome, barraca.semestre, barraca.periodo, barraca.idcurso, barraca.localizacao, curso.nome AS cnome'))->get();
        //view::make('barraca')->with(compact('cursosListagem'));

        //return $dadosBarraca;

        if ($barracaCad == 0){
            return redirect('/admin')->with("alert","Não existe BARRACA vinculada a seu usuário");
        }else{
                return view::make('barraca')->with(compact('cursosListagem'))->with(compact('dadosBarraca'));
        }
    }

    public function update(Request $request){
        $dadosBarracaUpdate = $request->only(['nome','curso','periodo','semestre','localizacao']);
        //return $dadosBarracaUpdate;
        
        if ($request->hasFile('logoBarraca')){
            if($request->file('logoBarraca')->isValid()){
                $name = Auth::user()->name.kebab_case(Auth::user()->id);
                $extensao =  $request['logoBarraca']->extension();
                $nameFile = "{$name}.{$extensao}";
                $nameCorrect = Str::kebab($nameFile);
                $upload = $request['logoBarraca']->storeAs('barracas',$nameCorrect);
                Storage::setVisibility('barracas/'.$nameCorrect, 'public');
                $url = Storage::url($nameCorrect);+

                DB::table('barraca')->where('idUser', Auth::id())->update([
                    'nome' => $dadosBarracaUpdate['nome'],
                    'idCurso' => $dadosBarracaUpdate['curso'],
                    'periodo' => $dadosBarracaUpdate['periodo'],
                    'semestre' => $dadosBarracaUpdate['semestre'],
                    'localizacao' => $dadosBarracaUpdate['localizacao'],
                    'nomeimagem' => $url
                ]);

                return redirect()->route('showBarracas');

            }else{
                return redirect()->back()->with('alert','O arquivo enviado não é valido!');
            }
        }else{
            DB::table('barraca')->where('idUser', Auth::id())->update([
                'nome' => $dadosBarracaUpdate['nome'],
                'idCurso' => $dadosBarracaUpdate['curso'],
                'periodo' => $dadosBarracaUpdate['periodo'],
                'semestre' => $dadosBarracaUpdate['semestre'],
                'localizacao' => $dadosBarracaUpdate['localizacao']
            ]);
        return redirect()->route('showBarracas');

            }        
}
}