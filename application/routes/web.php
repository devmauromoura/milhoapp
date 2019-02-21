<?php

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


/*	#### ROUTES PARA CONTROLE DE PÁGINAS ### */


Route::get('/home', 'HomeController@index')->name('home');

// Manipulação de Usuários

Route::middleware(['middlewareUsuario'])->group(function () {
    Route::post('/usuario/{id}', 'userController@post');
    Route::get('/usuario/{id}', 'userController@get');
    Route::put('/usuario/{id}', 'userController@put');
    Route::delete('/usuario/{id}', 'userController@delete');

});

// Manipulação de Cursos

Route::middleware(['middlewareCurso'])->group(function () {
    Route::post('/curso/{id}', 'cursoController@post');
    Route::get('/curso/{id}', 'cursoController@get');
    Route::put('/curso/{id}', 'cursoController@put');
    Route::delete('/curso/{id}', 'cursoController@delete');

});

// Manipulação de Barracas

Route::middleware(['middlewareBarraca'])->group(function () {
    Route::post('/barraca/{id}', 'barracaController@post');
    Route::get('/barraca/{id}', 'barracaController@get');
    Route::put('/barraca/{id}', 'barracaController@put');
    Route::delete('/barraca/{id}', 'barracaController@delete');

});

// Manipulação de Pratos

Route::middleware(['middlewarePrato'])->group(function () {
    Route::post('/prato/{id}', 'pratoController@post');
    Route::get('/prato/{id}', 'pratoController@get');
    Route::put('/prato/{id}', 'pratoController@put');
    Route::delete('/prato/{id}', 'pratoController@delete');

});

// Manipulação de Votos

Route::middleware(['middlewareVoto'])->group(function () {
    Route::post('/voto/{id}', 'votoController@post');
    Route::get('/voto/{id}', 'votoController@get');

});

// Manipulação de Ficha

Route::middleware(['middlewareFicha'])->group(function () {
    Route::post('/ficha/{id}', 'fichaController@post');
    Route::get('/ficha/{id}', 'fichaController@get');

});




/*	#### ROUTES PARA AUTENTICAÇÃO ### */

//Facebook
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

//Google
Route::get('login/google', 'Auth\LoginController@redirectToProviderGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallbackGoogle');
