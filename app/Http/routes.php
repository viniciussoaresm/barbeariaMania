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

/**
 * Event
 */
// Route::get('/', 'Ticket\EventController@listEvents');
Route::get('/', 'Site\SiteController@index');
Route::get('/login', 'Site\SiteController@login');
Route::get('/event/show/{id}', 'Ticket\EventController@show');
Route::get('/event/buy/{id}', 'Ticket\EventController@buy');
Route::post('/event/pay/{id}', 'Ticket\EventController@pay');
Route::post('/event/search', 'Ticket\EventController@search');

/**
 * Event Admin
 */
Route::group(['prefix' => 'admin'], function () {
    /**
     * Event
     */
    Route::get('/', 'Ticket\EventController@index');
    Route::get('/event', 'Ticket\EventController@index');
    Route::post('/event/search', 'Ticket\EventController@search');
    Route::get('/event/create', 'Ticket\EventController@create');
    Route::get('/event/edit/{id}', 'Ticket\EventController@edit');
    Route::post('/event/update/{id}', 'Ticket\EventController@update');
    Route::post('/event/store', 'Ticket\EventController@store');
    Route::get('/event/destroy/{id}', 'Ticket\EventController@destroy');
    Route::get('/event/published/{id}', 'Ticket\EventController@published');
    Route::get('/event/unpublished/{id}', 'Ticket\EventController@unpublished');
    
    /**
    * User
    */
    Route::get('/customer', 'Ticket\CustomerController@index');
    Route::post('/customer/search', 'Ticket\CustomerController@search');
    Route::get('/customer/create', 'Ticket\CustomerController@create');
    Route::get('/customer/show/{id}', 'Ticket\CustomerController@show');
    Route::get('/customer/edit/{id}', 'Ticket\CustomerController@edit');
    
    /**
    * Ticket
    */
    Route::get('/ticket', 'Ticket\TicketController@index');
});