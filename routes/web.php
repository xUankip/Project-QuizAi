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
Route::get('/user/topic/search', [TopicController::class, 'searchTopic'])->name('searchTopic');
//Route::get('/user/topic',[TopicController::class,'searchTopic'])->name('searchTopic');
Route::post('/user/topic',[TopicController::class, 'saveIdType'])->name('saveId');
Route::post('/user/questions/update', [TopicController::class, 'updateQuestion'])->name('updateQuestion');
Route::get('/user/search',[TopicController::class,'viewSearch'])->name('viewSearch');
Route::post('/user/search',[TopicController::class,'search'])->name('search');

Route::get('/user/game',[GameController::class,'viewGame'])->name('game');
Route::get('/user/game/{id}', [GameController::class, 'start'])->name('start');
Route::post('/user/game/{id}', [GameController::class, 'checkAccount'])->name('start.post');
Route::get('/user/game',[GameController::class,'viewPlayUsers'])->name('viewGame');
Route::post('/user/game', [GameController::class, 'checkAnswer'])->name('checkAnswer');
Route::get('/user/result',[GameController::class,'result'])->name('result');

Route::get('/user/quiz', [QuizController::class, 'showForm'])->name('showForm');
Route::post('/user/quiz', [QuizController::class, 'generateQuiz'])->name('generateQuiz');
Route::get('/user/quiz/topic/game/{id}', [QuizController::class, 'playGame'])->name('playGame');
Route::post('/user/quiz/createOrPlayGame', [QuizController::class, 'createOrPlayGame'])->name('createOrPlayGame');

//Route::post('/user/saveAll', [TopicController::class, 'saveAll'])->name('saveAll');

Route::get('/user/topUsers',[UserAnswerController::class,'topUser'])->name('topUsers');
Route::get('/user/userScore',[UserAnswerController::class,'userScore'])->name('userScore');

Route::get('/user/404',function (){ return view('layouts.404page');})->name('user.404');
Route::get('/user/err',function (){ return view('layouts.404page');})->name('user.err');
Route::get('/404',function (){ return view('layouts.404pagelandingpage');})->name('user.404landingpage');

//admin//
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;

Route::get('admin/users/login', [LoginController::class, 'index'])->name('logins');
Route::post('admin/users/login/home', [LoginController::class, 'home'])->name('admin.login.home');


Route::middleware(['auth'])->group(function () {
    Route::post('/admin/users/update/{id}', [MainController::class, 'updateUser']);

    Route::get('/admin/users/logout', function (){
        $users = \App\Models\Users::paginate(5);

        return view('admin.users', compact('users'));
    })->name('admin.users');
    Route::get('/user/4042',function (){ return view('admin.4042');})->name('4042');
    Route::get('/user/404',function (){ return view('admin.404page');})->name('404');
    Route::get('admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::get('admin/main', [MainController::class, 'index'])->name('admin');
    Route::post('admin/users/add', [MainController::class, 'addUser'])->name('admin.users.add');
    Route::get('admin/users/edit/{id}', [MainController::class, 'editUser'])->name('admin.users.edit');
    Route::post('admin/users/delete/{id}', [MainController::class, 'deleteUser'])->name('admin.users.delete');
    Route::post('admin/users/toggle/{id}', [MainController::class, 'toggleUserStatus'])->name('admin.users.toggle');
    Route::post('admin/games/delete/{id}', [MainController::class, 'deleteGame'])->name('admin.games.delete');
    Route::get('admin/search/users/username', [MainController::class, 'searchByUsername'])->name('users.searchByUsername');
});

