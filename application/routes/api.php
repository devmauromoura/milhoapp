<?php

use Illuminate\Http\Request;


Route::post('/login', 'UserController@apiLogin');
Route::post('/register', 'UserController@apiRegister');

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/user', 'UserController@getUser');
    Route::get('/items', 'dashController@getItemApi');
    Route::post('/registrarvoto','votoController@registrarVoto');
});



//Facebook
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

//Google
Route::get('login/google', 'Auth\LoginController@redirectToProviderGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallbackGoogle');
