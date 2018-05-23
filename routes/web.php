<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/cliente', 'ClienteController@novo');


Route::get('/client', 'ClienteController@list');
 
Route::put('/cliente/{id}', 'ClienteController@editar');
 
Route::delete('/cliente/{id}', 'ClienteController@excluir');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
