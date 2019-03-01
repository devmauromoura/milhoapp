<?php

use Illuminate\Support\Facades\View;

Auth::routes();

Route::get('/', 'UserController@ini')->name('index');
Route::post('/loginUser','UserController@login');
Route::get('/logout','UserController@logout');
Route::get('/cadastrarSenha/{id}','UserController@cadastrarSenha');
Route::post('/cadastrarSenha/{id}/aplicar','UserController@salvarSenha');

/*	#### ROUTES PARA CONTROLE DE PÁGINAS ### */

Route::group(['prefix'=> '/admin', 'middleware' => 'auth'], function(){
    Route::get('/', 'adminPageController@show');
});


Route::group(['prefix' => '/home', 'middleware' => 'auth'], function () {
    Route::get('/', function(){
        return view('home');
    });

});



// Manipulação de Usuários

Route::group(['prefix' => '/usuario', 'middleware' => 'auth'], function () {
    Route::get('/', 'adminPageController@show');
    Route::post('/create', 'adminPageController@create');
    Route::post('/{id}/select', 'adminPageController@select');
    Route::get('/{id}/edit', 'adminPageController@edit');
    Route::put('/{id}/update', 'adminPageController@update');
    Route::get('/{id}/delete', 'adminPageController@delete');

});

// Manipulação de Cursos

Route::group(['prefix' => '/curso', 'middleware' => 'auth'], function () {
    Route::get('/', 'cursoController@show');
    Route::post('/create', 'cursoController@create');
    Route::get('/{id}/delete', 'cursoController@delete');
});

// Manipulação de Barracas

Route::group(['prefix' => '/barraca', 'middleware' => 'auth'], function () {
    Route::get('/', 'barracaController@show')->name('showBarracas');
    Route::post('/update', 'barracaController@update');
    Route::delete('/{id}', 'barracaController@delete');

});

// Manipulação de Pratos

Route::group(['prefix' => '/pratos', 'middleware' => 'auth'], function () {
    Route::get('/',function(){return view('pratos');});
    Route::post('/{id}', 'pratoController@post');
    Route::get('/{id}', 'pratoController@get');
    Route::put('/{id}', 'pratoController@put');
    Route::delete('/{id}', 'pratoController@delete');

});

// Manipulação de Bebidas

Route::group(['prefix' => '/bebidas/', 'middleware' => 'auth'], function () {
    Route::get('/',function(){return view('bebidas');});
    Route::post('/{id}', 'pratoController@post');
    Route::get('/{id}', 'pratoController@get');
    Route::put('/{id}', 'pratoController@put');
    Route::delete('/{id}', 'pratoController@delete');

});


// Manipulação de Votos

Route::group(['prefix' => '/voto/', 'middleware' => 'auth'], function () {
    Route::post('/{id}', 'votoController@post');
    Route::get('/{id}', 'votoController@get');

});

// Manipulação de Ficha

Route::group(['prefix' => '/ficha/', 'middleware' => 'auth'], function () {
    Route::post('/{id}', 'fichaController@post');
    Route::get('/{id}', 'fichaController@get');

});

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');