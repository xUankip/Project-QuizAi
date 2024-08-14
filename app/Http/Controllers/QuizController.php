<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Game;
use App\Models\Question;
use App\Models\Topic;
use App\Models\UserAnswer;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\DB;
use SomeNamespace\Exceptions\ConnectionException;
use Illuminate\Http\Request;
use OpenAI;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
{
    public function showForm()
    {
        return view('games.generate');
    }

    public function generateQuiz(Request $request)
    {
        $request->validate([
            'topic' => 'required',
            'game' => 'required',
            'number' => 'required|integer|min:5|max:20',
        ]);

        $topicName = $request->input('topic');
        $gameName = $request->input('game');
        $number = $request->input('number');

        try {
            $client = OpenAI::client(env('OPENAI_API_KEY'));

            $prompt = "Tạo một game với tên là $gameName với chủ đề là $topicName và có $number câu hỏi.
             Dữ liệu trả về nên ở định dạng JSON. Mỗi câu hỏi nên có 4 lựa chọn đáp án, và chỉ có một đáp án đúng.
              Danh sách câu hỏi nên nằm trong trường ‘quiz’, các lựa chọn đáp án trong trường ‘answers’,
               và đáp án đúng trong trường ‘correct_answer’. Chỉ tạo bằng tiếng Việt.";

            $response = $client->chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'user', 'content' => $prompt],
                ],
            ]);
            $quizData = $response['choices'][0]['message']['content'];
            $decoded = json_decode($quizData, true);
            // Check if topic exists, if not create it
            $topic = Topic::firstOrCreate(['name' => $topicName]);

            // Check if game exists, if not create it
            $game = Game::firstOrCreate([
                'name' => $gameName,
                'topic_id' => $topic->id,
                'description' => 'Quiz generated by OpenAI',
                'cover_img' => null,
                'qr_code' => null,
                'created_by' => 1,
                'deleted_by' => null,
                'start_time' => now(),
                'end_time' => now()->addDays(1),
            ]);

            foreach ($decoded['quiz'] as $quizItem) {
                // Insert question into the question table
                $question = new Question();
                $question->game_id = $game->id;// Set the game ID
                $question->content = $quizItem['question'];
                $question->countdown_time = 30; // Example: setting a default countdown time
                $question->correct_answer = $quizItem['correct_answer'];
                $question->score = 10; // Example: setting a default score
                $question->save();

                // Insert answers into the answer table
                foreach ($quizItem['answers'] as $answerContent) {
                    $answer = new Answer();
                    $answer->question_id = $question->id;
                    $answer->answer_content = $answerContent;
                    $answer->correct_answer = $quizItem['correct_answer'];
                    $answer->save();
                }
            }
            return redirect('/quiz/' . $game->id);
//            return view('questions.question-list', compact('topic', 'game', 'decoded'));
        } catch (Exception $e) {
            return back()->with('error', 'An error occurred while generating the quiz: ' . $e->getMessage());
        }
    }

    public function showGame($id)
    {
        // get game by id.
        $game = Game::findOrFail($id);
        if (!$game) return;
        return view('games.detail', compact('game'));
    }

    public function viewPlayUsers()
    {
        // get game by id.
        $id = Session::get('gameID');
//        $id = 8;
        $game = Game::findOrFail($id);
//            Session::put('gameID', $game->id);
        // Khởi tạo chỉ số câu hỏi hiện tại trong session, bắt đầu từ 0.
        Session::put('currentQuestionIndex', 0);
        // Trả về view 'games.ingame' và truyền đối tượng game và câu hỏi đầu tiên của trò chơi.
        return view('games.ingame', [
            'game' => $game,
            'currentQuestion' => $game->questions()->first()
        ]);
//            return view('games.ingame', compact('game'));
    }

    public function checkAnswer(Request $request)
    {
        $gameId = Session::get('gameID');
        $answer = $request->input('answer_content');
        $game = Game::findOrFail($gameId);
        $questionId = $request->input('question_id'); // Lấy ID câu hỏi từ request
        $userId = 5;
        $question = Question::findOrFail($questionId);
//            $questionId = $question->id;

        $user_answer = new UserAnswer();
        $user_answer->user_id = $userId;
        $user_answer->game_id = $gameId;
        $user_answer->question_id = $questionId;
        $user_answer->selected_answer = $answer;
        $user_answer->score = 0;
//            dd($questionId);
//            dd($question->correct_answer);
        if ($answer == $question->correct_answer) {
            $user_answer->score = 10;
        }
        $user_answer->save();

        // Đếm số câu trả lời đúng của người dùng
        $correctAnswersCount = UserAnswer::where('game_id', $gameId)
            ->where('user_id', $userId)
            ->where('score', 10)
            ->count();
        $currentQuestionIndex = Session::get('currentQuestionIndex');
        $totalQuestions = $game->questions->count();
        // Kiểm tra nếu vẫn còn câu hỏi tiếp theo
        if ($currentQuestionIndex < $totalQuestions - 1) {
            // Tăng chỉ số câu hỏi hiện tại
            Session::put('currentQuestionIndex', $currentQuestionIndex + 1);
            $nextQuestion = $game->questions()->skip($currentQuestionIndex + 1)->first();

            // Trả về view 'games.ingame' với câu hỏi tiếp theo
            return view('games.ingame', [
                'game' => $game,
                'currentQuestion' => $nextQuestion,
                'correctAnswers' => UserAnswer::where('game_id', $gameId)->where('user_id', $userId)->where('score', 10)->count(),
                'totalQuestions' => $totalQuestions,
            ]);
        } else {
            // Hiển thị kết quả cuối cùng
            return view('games.result', [
                'game' => $game,
                'correctAnswers' => UserAnswer::where('game_id', $gameId)->where('user_id', $userId)->where('score', 10)->count(),
                'totalQuestions' => $totalQuestions,
            ]);
        }
    }
//    public function generateQuiz(Request $request)
//    {
//        $request->validate([
//            'topic' => 'required',
//            'game'=>'required',
//            'number' => 'required|string',
//        ]);
//        $topic = $request->input('topic');
//        $game = $request->input('game');
//        $number = $request->input('number');
//
//        try {
//            $client = OpenAI::client(env('OPENAI_API_KEY'));
//
//            $prompt = " Tạo cho tôi một game quiz có tên là $game với chủ đề là
//             $topic với số lượng câu hỏi là $number.
//            Dữ liệu trả về cho tôi ở định dạng json.
//             Mỗi câu hỏi có 4 lựa chọn đáp án và chỉ có một đáp án đúng
//            .Danh sách câu hỏi nằm trong trường quiz,
//             danh sách câu trả lời nằm trong trường answers của quiz,
//              câu trả lời đúng nằm trong trường correct_answer của quiz";
//
//            $response = $client->chat()->create([
//                'model' => 'gpt-3.5-turbo',
//                'messages' => [
//                    ['role' => 'user', 'content' => $prompt],
//                ],
//            ]);
//
//            $quizData = $response['choices'][0]['message']['content'];
//            // save list question
//            // save list answer;
//            $decoded = json_decode($quizData);
//            // redirect detail with game id.
//            return view('questions.question-list', compact('topic','game', 'decoded'));
//        } catch (Exception $e) {
//            return back()->with('error', 'Có lỗi xảy ra khi tạo quiz: ' . $e->getMessage());
//        }
//    }

}
