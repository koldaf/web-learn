<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('pages.login');
})->name('login');


Route::get('/register', function(){
    return view('pages.register');
});
Route::post('/register', [UserController::class, 'register']);

//Authentications
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'dashboard'] )->middleware('auth');

Route::controller(TopicController::class)->group(function(){
    Route::get('/transformer', 'transformer');
    Route::get('/seriesandparallel', 'series');
    Route::get('/electricmotor', 'electric');
    Route::get('/conductors', 'conductor');

});

//Route::post('register',[UserController::class, 'register'])->name('register');
