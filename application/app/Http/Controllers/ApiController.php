<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function barracaShow(){
      return response()->json(['message'=>'Retorno de teste com sucesso!']);
    }
}
