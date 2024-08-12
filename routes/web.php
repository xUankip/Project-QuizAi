<?php

use App\Models\Users;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OpenAIController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\QuestionController;


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


//test AI

Route::get('/quiz', [QuizController::class, 'showForm']);
Route::post('/quiz', [QuizController::class, 'generateQuiz'])->name('generateQuiz');
Route::get('/quiz/{id}', [QuizController::class, 'showGame'])->name('showGame');


// điều khoản
Route::get('/termsOfService',[UserController::class,'viewTermsOfService'])->name('termsOfService');
//Route::get('/chat', function (){
//    try {
//        $client = OpenAI::client('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');
//        $prompt = "Tạo cho tôi một bài thi trắc nghiệm với 3 câu hỏi về chủ đề Hồ Chí Minh. Mỗi câu hỏi có 4 lựa chọn đáp án và chỉ có một đáp án đúng.
//         Dữ liệu trả về cho tôi ở định dạng json.";
//
//        $response = $client->chat()->create([
//            'model' => 'gpt-3.5-turbo',
//            'messages' => [
//                ['role' => 'system', 'content' => 'You are a helpful assistant.'],
//                ['role' => 'user', 'content' => $prompt],
//            ],
//        ]);
//
//        $fake_response = '{
//              "quiz": [
//                {
//                  "question": "Hồ Chí Minh sinh năm nào?",
//                  "choices": [
//                    "1890",
//                    "1900",
//                    "1910",
//                    "1920"
//                  ],
//                  "correct_answer": "1890"
//                },
//                {
//                  "question": "Hồ Chí Minh đã sử dụng tên nào khi viết bản Tuyên ngôn Độc lập năm 1945?",
//                  "choices": [
//                    "Nguyễn Tất Thành",
//                    "Nguyễn Ái Quốc",
//                    "Trần Dân Tiên",
//                    "Lý Thụy"
//                  ],
//                  "correct_answer": "Nguyễn Ái Quốc"
//                },
//                {
//                  "question": "Năm nào Hồ Chí Minh đã đọc bản Tuyên ngôn Độc lập, khai sinh ra nước Việt Nam Dân chủ Cộng hòa?",
//                  "choices": [
//                    "1940",
//                    "1942",
//                    "1945",
//                    "1950"
//                  ],
//                  "correct_answer": "1945"
//                }
//              ]
//            }';
//        return $response;
//    } catch (\Exception $e) {
//        return $e->getMessage();
//    }
//});
//
//Route::get('/handle-chat', function (){
//    try {
//        $fake_response = '{
//              "quiz": [
//                {
//                  "question": "Hồ Chí Minh sinh năm nào?",
//                  "choices": [
//                    "1890",
//                    "1900",
//                    "1910",
//                    "1920"
//                  ],
//                  "correct_answer": "1890"
//                },
//                {
//                  "question": "Hồ Chí Minh đã sử dụng tên nào khi viết bản Tuyên ngôn Độc lập năm 1945?",
//                  "choices": [
//                    "Nguyễn Tất Thành",
//                    "Nguyễn Ái Quốc",
//                    "Trần Dân Tiên",
//                    "Lý Thụy"
//                  ],
//                  "correct_answer": "Nguyễn Ái Quốc"
//                },
//                {
//                  "question": "Năm nào Hồ Chí Minh đã đọc bản Tuyên ngôn Độc lập, khai sinh ra nước Việt Nam Dân chủ Cộng hòa?",
//                  "choices": [
//                    "1940",
//                    "1942",
//                    "1945",
//                    "1950"
//                  ],
//                  "correct_answer": "1945"
//                }
//              ]
//            }';
//        $decoded = json_decode($fake_response);
//        return view('test', compact('decoded'));
//    } catch (\Exception $e) {
//        return $e->getMessage();
//    }
//});

Route::post('/saveAll', [TopicController::class, 'saveAll'])->name('saveAll');
