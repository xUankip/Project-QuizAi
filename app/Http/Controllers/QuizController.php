<?php

namespace App\Http\Controllers;

use Dflydev\DotAccessData\Data;
use SomeNamespace\Exceptions\ConnectionException;
use Illuminate\Http\Request;
use OpenAI;


class QuizController extends Controller
{
    public function showForm()
    {
        return view('users.create_quiz');
    }

    public function generateQuiz(Request $request)
    {
        $request->validate([
            'topic' => 'required',
            'game'=>'required',
            'number' => 'required|string',
        ]);
        $topic = $request->input('topic');
        $game = $request->input('game');
        $number = $request->input('number');

        try {
            $client = OpenAI::client(env('OPENAI_API_KEY'));

            $prompt = " Tạo cho tôi một game quiz có tên là $game với chủ đề là
             $topic với số lượng câu hỏi là $number.
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

            return view('questions.question-list', compact('topic','game', 'decoded'));
        } catch (Exception $e) {
            return back()->with('error', 'Có lỗi xảyra khi tạo quiz: ' . $e->getMessage());
        }
    }

}
