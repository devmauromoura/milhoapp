<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\testes;

class testesController extends Controller
{
    public function testeInicial ($valor){
        $dado = $valor;

        return $dado;


    }
}
