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

//Access without login
Route::get('/', 'HomeController@index')->name('home');

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

    });