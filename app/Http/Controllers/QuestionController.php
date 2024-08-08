<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        // Đọc dữ liệu từ file JSON
        if (Storage::exists('questions.json')) {
            $json = Storage::get('questions.json');
            $questions = json_decode($json, true);

            // Kiểm tra xem dữ liệu có phải là mảng không
            if (!is_array($questions)) {
                $questions = [];
            }
        } else {
            $questions = [];
        }

        // Tạo phân trang cho câu hỏi
        $perPage = 1; // Số câu hỏi mỗi trang
        $currentPage = $request->input('page', 1);
        $totalQuestions = count($questions);
        $questionsPaginated = array_slice($questions, ($currentPage - 1) * $perPage, $perPage);

        // Truyền dữ liệu đến view
        return view('questions.index', [
            'questions' => $questionsPaginated,
            'currentPage' => $currentPage,
            'totalQuestions' => $totalQuestions,
            'perPage' => $perPage
        ]);
    }
    public function questionInGame()
    {
        return view('questions.question-ingame');
    }
    public function questionList()
    {
        return view('questions.question-list');
    }
}
