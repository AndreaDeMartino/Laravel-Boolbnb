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
Route::get('/place/{slug}', 'GuestController@show')->name('place.show');

// Send message to User
Route::post('/message/{id}', 'GuestController@sendMessage')->name('message.send');

//Auth routes
Auth::routes();

// Gruppo Autenticazione
Route::prefix('user') // URI
    ->name('user.') // PREFISSO NAME
    ->namespace('User') //ACTION
    ->middleware('auth')
    ->group(function(){

        // User Home (DA ELIMINARE)
        // Route::get('/home', 'HomeController@index')->name('home'); 

        //Payment
        Route::get('/payment/{id}', 'PaymentController@index')->name('payment');
        Route::post('/paymentstore{id}', 'PaymentController@store')->name('store');

        //Places
        Route::get('/my-places', 'PlaceController@index')->name('myplace.index');
        Route::get('/new-place', 'PlaceController@create')->name('place.create');
        Route::post('/new-place-store', 'PlaceController@store')->name('place.store');

        Route::get('/my-places/{slug}/edit/', 'PlaceController@edit')->name('place.edit');

        Route::patch('/update/{place}', 'PlaceController@update')->name('place.update');

        Route::delete('/destroy/{place}', 'PlaceController@destroy')->name('place.destroy');
    });