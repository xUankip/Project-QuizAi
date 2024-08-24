<?php

use App\Http\Controllers\GameController;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OpenAIController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserAnswerController;


Route::get('/', [UserController::class,'viewInk outdex'])->name('home');
Route::get('/user/index', [UserController::class,'viewHome'])->name('homeUser');
Route::get('/user/login', [UserController::class, 'viewLogin'])->name('login');
Route::post('/user/login', [UserController::class, 'loginPost'])->name('login.post');
Route::get('/user/register', [UserController::class, 'viewRegister'])->name('register');
Route::post('/user/register', [UserController::class, 'registerPost'])->name('register.post');
Route::get('/user/update', [UserController::class, 'viewUpdate'])->name('update');
Route::post('/user/update', [UserController::class, 'update'])->name('update.post');
Route::get('/user/update/updatePassword', [UserController::class, 'viewUpdatePassword'])->name('updatePassword');
Route::post('/user/update/updatePassword', [UserController::class, 'updatePassword'])->name('updatePassword.post');

Route::get('/user/topic',[TopicController::class,'viewTopic'])->name('topic');
Route::post('/user/topic',[TopicController::class, 'saveIdType'])->name('saveId');
Route::post('/user/questions/update', [TopicController::class, 'updateQuestion'])->name('updateQuestion');
Route::get('/user/search',[TopicController::class,'viewSearch'])->name('viewSearch');
Route::post('/user/search',[TopicController::class,'search'])->name('search');

Route::get('/user/game',[GameController::class,'viewGame'])->name('game');
Route::get('/user/game/{id}', [GameController::class, 'start'])->name('start');
Route::post('/user/game/{id}', [GameController::class, 'checkAccount'])->name('start.post');
Route::get('/user/game',[GameController::class,'viewPlayUsers'])->name('viewGame');
Route::post('/user/game', [GameController::class, 'checkAnswer'])->name('checkAnswer');

Route::get('/user/quiz', [QuizController::class, 'showForm'])->name('showForm');
Route::post('/user/quiz', [QuizController::class, 'generateQuiz'])->name('generateQuiz');
Route::get('/user/quiz/topic/game/{id}', [QuizController::class, 'playGame'])->name('playGame');
Route::post('/user/quiz/createOrPlayGame', [QuizController::class, 'createOrPlayGame'])->name('createOrPlayGame');

Route::post('/user/saveAll', [TopicController::class, 'saveAll'])->name('saveAll');

Route::get('/user/topUsers',[UserAnswerController::class,'topUser'])->name('topUsers');
Route::get('/user/userScore',[UserAnswerController::class,'userScore'])->name('userScore');

Route::get('/user/404',function (){ return view('layouts.404page');})->name('user.404');
