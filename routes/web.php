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


Route::get('/',function(){
return view('index');
});
Route::get('/voiture',function(){
    return view('voiture');
    });
Route::get('/bus',function(){
    return view('bus');
    });
    Route::get('/cnx',function(){
        return view('connexion');
        });
