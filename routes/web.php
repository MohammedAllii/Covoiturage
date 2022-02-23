<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TrajetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;


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


Route::get('/',[AuthController::class,'home']);
//dashboard
Route::get('/dashboard',[AdminController::class,'dashb']);
Route::post('/dashboardd',[AdminController::class,'dashboardd'])->name('dashboardd');
Route::get('/board',[AdminController::class,'dashboard']);
Route::get('/tous',[AdminController::class,'Altrajet']);
Route::get('/allusers',[AdminController::class,'Allusers']);
Route::get('/alltrajets',[AdminController::class,'Alltrajets']);
Route::post('/updateadmin',[AdminController::class,'updateadmin'])->name('updateadmin');
Route::get('/deletess{id}',[AdminController::class,'deletes']);
Route::get('/deleteuser{id}',[AdminController::class,'deleteuser']);
Route::get('/updatetrajet{id}',[AdminController::class,'updateTrajet'])->name('updateTrajet');
Route::get('/updateuser{id}',[AdminController::class,'updateuser']);
Route::post('/updateusers',[AdminController::class,'updateusers'])->name('updateusers');




Route::get('/chercher',[AuthController::class,'chercher']);
Route::get('/trajet',function(){return view('trajet');});
Route::get('/cnx',[AuthController::class,'login']);
Route::get('/decocnx',[AuthController::class,'logout']);
Route::get('/inscrit',[AuthController::class,'registration']);
Route::get('/accueil',[TrajetController::class,'AllTrajet']);
Route::get('/all',[TrajetController::class,'Toustrajets']);
Route::get('/trajet',[TrajetController::class,'accueil']);
Route::post('/register',[AuthController::class,'inscription'])->name('register');
Route::post('/login',[AuthController::class,'connexion'])->name('login');
Route::post('/AddTrajets',[TrajetController::class,'AddTrajet'])->name('AddTrajets');
Route::get('/voiture',[TrajetController::class,'search']);
Route::get('/profile',[ProfileController::class,'profile']);
Route::post('/update',[ProfileController::class,'update'])->name('update');
Route::get('/deletes{id}',[ProfileController::class,'delete']);
Route::get('/modifier{id}',[ProfileController::class,'modifierTrajet']);
Route::get('/reserver',[TrajetController::class,'reserver']);
Route::post('/updatetrajet',[ProfileController::class,'updateTrajet'])->name('updatetrajet');











