<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestContoller;

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
    Route::get('/transformer', 'transformer')->middleware('auth');
    Route::get('/seriesandparallel', 'series')->middleware('auth');
    Route::get('/electricmotor', 'electric')->middleware('auth');
    Route::get('/conductors', 'conductor')->middleware('auth');

});

//ExamsRoutes
Route::controller(ExamController::class)->group(function(){
    Route::get('/available-exams','list');
    Route::get('/setup-exam', 'create');
    Route::post('/setup-exam', 'store_exam');

    Route::get('/view/{exam_id}', 'view_question_set');

    Route::get('/view-score/{exam_id}', 'view_scores');

    Route::get('/edits/{question_id}', 'edit_quiz');
    Route::post('/edits/{question_id}', 'update');

    Route::delete('/delete/{exam_id}', 'destroy');
});

//TestRoutes
Route::controller(TestContoller::class)->group(function(){
    Route::get('/test', 'list')->middleware('auth');
    Route::get('/start/{id}', 'start')->middleware('auth');
    Route::post('/start', 'submit')->middleware('auth');
});



//Route::post('register',[UserController::class, 'register'])->name('register');
