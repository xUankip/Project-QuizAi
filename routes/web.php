<?php

use App\Http\Controllers\GameController;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OpenAIController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserAnswerController;


Route::get('/', [UserController::class,'viewIndex'])->name('home');
Route::get('/index', [UserController::class,'viewHome'])->name('homeUser');

Route::get('/user/login', [UserController::class, 'viewLogin'])->name('login');
Route::post('/user/login', [UserController::class, 'loginPost'])->name('login.post');

Route::get('/user/register', [UserController::class, 'viewRegister'])->name('register');
Route::post('/user/register', [UserController::class, 'registerPost'])->name('register.post');

Route::get('/user/update', [UserController::class, 'viewUpdate'])->name('update');
Route::post('/user/update', [UserController::class, 'update'])->name('update.post');

Route::get('/user/update/password', [UserController::class, 'viewUpdatePassword'])->name('updatePassword');
Route::post('/user/update/password1', [UserController::class, 'updatePassword'])->name('updatePassword.post');
//game

Route::get('/user/topic',[TopicController::class,'viewTopic'])->name('topic');

Route::post('/user/topic',[TopicController::class, 'saveIdType'])->name('saveId');

Route::get('/user/game',[TopicController::class,'viewGame'])->name('game');

Route::get('/game/{id}', [GameController::class, 'start'])->name('start');
Route::post('/game/{id}', [GameController::class, 'checkAccount'])->name('start.post');
Route::get('/quiz/viewPlayUsers', [QuizController::class, 'viewPlayUsers'])->name('viewPlayUsers');
Route::post('/quiz/checkAnswer', [QuizController::class, 'checkAnswer'])->name('checkAnswer');


Route::get('/quiz', [QuizController::class, 'showForm'])->name('showForm');
Route::post('/quiz', [QuizController::class, 'generateQuiz'])->name('generateQuiz');
Route::get('/quiz/{id}', [QuizController::class, 'showGame'])->name('showGame');
Route::post('/quiz/createOrPlayGame', [GameController::class, 'createOrPlayGame'])->name('createOrPlayGame');
Route::post('/saveAll', [TopicController::class, 'saveAll'])->name('saveAll');

// handle question update
Route::post('/questions/update', [GameController::class, 'updateQuestion'])->name('updateQuestion');
Route::post('/answers/update', [GameController::class, 'updateAnswer'])->name('updateAnswer');

// điều khoản
Route::get('/termsOfService',[UserController::class,'viewTermsOfService'])->name('termsOfService');

// người chơi

Route::get('/topUsers',[UserAnswerController::class,'topUser'])->name('topUsers');
Route::get('/userScore',[UserAnswerController::class,'userScore'])->name('userScore');
