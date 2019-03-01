<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Barraca;
use View;

class barracaController extends Controller
{
    public function show(){

        $idUser = Auth()->User()->id;
        $barracaCad = DB::table('barraca')->where('idUser', $idUser)->count();
        //return $barracaCad;
        
        if ($barracaCad == 0){
            $cursosListagem = DB::table('curso')->get();
            return view::make('barraca')->with(compact('cursosListagem'));
        }else{
                return "Com dados na barraca";
        }
    }
}
