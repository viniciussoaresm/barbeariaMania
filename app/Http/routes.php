<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'Site\SiteController@index');
Route::get('/login', 'Site\SiteController@login');
Route::get('/logout', 'Site\SiteController@logout');
Route::post('/login', 'Site\SiteController@dologin');
Route::get('/newUser', 'Site\SiteController@newUser');


Route::group(['prefix' => 'client'], function () {
    Route::post('/create', 'Client\ClientController@create');
    Route::get('/panel', 'Client\ClientController@panel');
});
    

Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', 'Adm\AdmController@dashboard');
    Route::get('/login', 'Adm\AdmController@login');
    Route::post('/login', 'Adm\AdmController@dologin');
    Route::get('/register', 'Adm\AdmController@register');
    Route::post('/register', 'Adm\AdmController@doregister');
});