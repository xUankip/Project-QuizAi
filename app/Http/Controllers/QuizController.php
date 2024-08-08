<?php

namespace App\Http\Controllers;

use SomeNamespace\Exceptions\ConnectionException;
use Illuminate\Http\Request;
use OpenAI;


class QuizController extends Controller
{
    public function showForm()
    {
        return view('quizForm');
    }

    public function generateQuiz(Request $request)
    {
        $request->validate([
            'nd' => 'required|string',
            'question_count' => 'nullable|integer|min:1',
        ]);

        $quiz = $request->input('nd');
        $questionCount = $request->input('question_count');

        try {
            $client = OpenAI::client(env('OPENAI_API_KEY'));

            $prompt = "Tạo một bài kiểm tra với $questionCount câu hỏi về chủ đề sau: $quiz,
            Dữ liệu trả về cho tôi ở định dạng json.
             Mỗi câu hỏi có 4 lựa chọn đáp án và chỉ có một đáp án đúng
            .Danh sách câu hỏi nằm trong trường quiz,
             danh sách câu trả lời nằm trong trường answers của quiz,
              câu trả lời đúng nằm trong trường correct_answer của quiz";

            $response = $client->chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'user', 'content' => $prompt],
                ],
            ]);

            $quizData = $response['choices'][0]['message']['content'];
            $decoded = json_decode($quizData);

            return view('testQuizAi', compact('quiz', 'decoded'));
        } catch (Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra khi tạo quiz: ' . $e->getMessage());
        }
    }

}
