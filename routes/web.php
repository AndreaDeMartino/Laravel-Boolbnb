<?php

use Illuminate\Support\Facades\Route;

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

//View Places in Homepage
Route::get('/', 'GuestController@index')->name('home.index');

// View Single Place
Route::get('/place/{slug}', 'GuestController@show')-> name('place.show');

// Send message to User
Route::post('/message/{id}', 'GuestController@sendMessage') -> name('message.send');

//Auth routes
Auth::routes();

// Gruppo Autenticazione
Route::prefix('user') // URI
    ->name('user.') // PREFISSO NAME
    ->namespace('User') //ACTION
    ->middleware('auth')
    ->group(function(){

        // User Home
        Route::get('/home', 'HomeController@index')->name('home'); 

        //Payment
        Route::get('/payment/{id}', 'PaymentController@index')->name('payment');
        Route::post('/paymentstore{id}', 'PaymentController@store')->name('store');
    });