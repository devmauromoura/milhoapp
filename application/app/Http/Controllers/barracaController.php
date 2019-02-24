<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Barraca;
use View;

class barracaController extends Controller
{
    public function show(){
    	$cursosListagem = DB::table('curso')->get();

    	return view::make('barraca')->with(compact('cursosListagem'));
    }
}
