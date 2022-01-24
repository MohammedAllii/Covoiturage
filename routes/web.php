<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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


Route::get('/',function(){return view('index');});
Route::get('/trajet',function(){return view('trajet');});
Route::get('/voiture',function(){return view('voiture');});
Route::get('/bus',function(){return view('bus');});
Route::get('/cnx',[AuthController::class,'login']);
Route::get('/decocnx',[AuthController::class,'logout']);
Route::get('/inscrit',[AuthController::class,'registration']);
Route::get('/accueil',[AuthController::class,'accueil']);
Route::post('/register',[AuthController::class,'inscription'])->name('register');
Route::post('/login',[AuthController::class,'connexion'])->name('login');




