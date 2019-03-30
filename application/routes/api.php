<?php

use Illuminate\Http\Request;


Route::post('/login', 'UserController@apiLogin');
Route::post('/register', 'UserController@apiRegister');

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('login/google', 'Auth\LoginController@redirectToProviderGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallbackGoogle');

Route::get('/logout','UserController@apiLogout');

Route::get('/pratos','ApiController@pratoShow');
Route::get('/bebidas','ApiController@bebidaShow');

Route::prefix('/barraca')->group(function(){
  Route::get('/','ApiController@barracaShow');
  Route::get('/{id}/pratos/','ApiController@pratoBarraca');
  Route::get('/{id}/bebidas/','ApiController@bebidaBarraca');
});

Route::group(['middleware' => 'auth:api'], function(){
    //Route::get('/user', 'UserController@getUser');
    //Route::get('/items', 'dashController@getItemApi');
    Route::post('/registrarvoto','votoController@registrarVoto');

    // Route::prefix('/barraca')->group(function(){
    //   Route::get('/','ApiController@barracaShow');
    //   Route::get('/{id}/pratos/','ApiController@pratoBarraca');
    //   Route::get('/{id}/bebidas/','ApiController@bebidaBarraca');
    // });


});