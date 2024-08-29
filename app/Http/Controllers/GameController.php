<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Game;
use App\Models\Question;
use App\Models\Topic;
use App\Models\User;
use App\Models\UserAnswer;
use App\Models\Users;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use SomeNamespace\Exceptions\ConnectionException;
use Illuminate\Http\Request;
use OpenAI;

class GameController extends Controller
{
    public function start($id)
    {
        $games = Game::findOrFail($id);

        // Tạo link với ID của trò chơi
        $link = url("127.0.0.1/games/" . $games->id);

        // Lưu gameID vào session
        Session::put('gameID', $games->id);

        // Trả về view với dữ liệu trò chơi và link
        return view('games.start', compact('games', 'link'));
    }

    public function checkAccount()
    {
        $gameId = Session::get('gameID');
        $userId = Session::get('user_id');
        $game = Game::findOrFail($gameId);
        $userHasPlayed = UserAnswer::where('user_id', $userId)
            ->where('game_id', $gameId)
            ->exists();
        $userScore = DB::table('user')
            // Chọn cột của user và cột total_score trong bảng user_answers
            ->select('user.id', 'user.name', DB::raw('SUM(user_answer.score) as total_score'))
            // Kết hợp bảng users với bảng user_answer để lấy điểm số của từng người chơi
            ->join('user_answer', 'user.id', '=', 'user_answer.user_id')
            // Nhóm kết quả theo các cột cụ thể
            ->groupBy('user.id', 'user.name')
            ->where('user.id', $userId)
            ->where('user_answer.game_id', $gameId)
            ->first();
        $correctAnswers = UserAnswer::where('game_id', $gameId)->where('user_id', $userId)->where('score', '!=', 0)->count();
        $totalQuestions = $game->questions->count();

        if ($userHasPlayed) {
            $score = $userScore->total_score ? number_format($userScore->total_score, 2) : '0.00';
            return redirect()->back()->with('displayThePlayerIsScore', "{$score} of 100")
                ->with('displayThePlayerIsResult', "{$correctAnswers} of {$totalQuestions}");
        }
        return redirect()->route('viewGame');
    }

    public function viewGame()
    {
        $usersID = Session::get('user_id');
        $users = Users::findOrFail($usersID);
        $topicID = Session::get('topic_id');
        $games = Game::findOrFail($topicID);
        return view('users.game', compact('games', 'users'));
    }

    public function viewPlayUsers()
    {
        $id = Session::get('gameID');
//        dd($id);
        $game = Game::findOrFail($id);
        Session::put('currentQuestionIndex', 0);
        return view('games.ingame', [
            'game' => $game,
            'currentQuestion' => $game->questions()->first()
        ]);
    }

    public function checkAnswer(Request $request)
    {
        $gameId = Session::get('gameID');
        $answer = $request->input('answer_content');
        $game = Game::findOrFail($gameId);
        $questionId = $request->input('question_id'); // Lấy ID câu hỏi từ request
        $userId = Session::get('user_id');
        $totalQuestions = $game->questions->count();

        $existingAnswer = UserAnswer::where('user_id', $userId)
            ->where('game_id', $gameId)
            ->where('question_id', $questionId)
            ->first();

        if ($existingAnswer) {
            // Người dùng đã trả lời câu hỏi này, không lưu lại nữa
            return $this->result();
        }

        $question = Question::findOrFail($questionId);

        $user_answer = new UserAnswer();
        $user_answer->user_id = $userId;
        $user_answer->game_id = $gameId;
        $user_answer->question_id = $questionId;
        $user_answer->selected_answer = $answer;
        $user_answer->score = 0;
        $scoreQuestion = 100 / $totalQuestions;
        $timeLeft = $request->input('time_left');

        if ($answer == $question->correct_answer) {
            $user_answer->score = round($scoreQuestion * ($timeLeft / 30), 2);
            $user_answer->time_taken = $timeLeft;
        }
        $user_answer->save();

        $currentQuestionIndex = Session::get('currentQuestionIndex');
        // Kiểm tra nếu vẫn còn câu hỏi tiếp theo
        if ($currentQuestionIndex < $totalQuestions - 1) {
            // Tăng chỉ số câu hỏi hiện tại
            Session::put('currentQuestionIndex', $currentQuestionIndex + 1);
            $nextQuestion = $game->questions()->skip($currentQuestionIndex + 1)->first();

            // Trả về view 'games.ingame' với câu hỏi tiếp theo
            return view('games.ingame', [
                'game' => $game,
                'currentQuestion' => $nextQuestion,
                'correctAnswers' => UserAnswer::where('game_id', $gameId)->where('user_id', $userId)->where('score', '!=', 0)->count(),
                'totalQuestions' => $totalQuestions,
            ]);
        } else {
            return $this->result();
        }
    }

    public function result()
    {
        $gameId = Session::get('gameID');
        $game = Game::findOrFail($gameId);
        $userId = Session::get('user_id');
        $totalQuestions = $game->questions->count();
        // Truy vấn đến bảng users
        $topUsers = DB::table('user')
            // Chọn cột của user và cột total_score trong bảng user_answers
            ->select('user.id', 'user.name', DB::raw('SUM(user_answer.score) as total_score'))
            ->where('user_answer.game_id', $gameId)

            // Kết hợp bảng users với bảng user_answer để lấy điểm số của từng người chơi
            ->join('user_answer', 'user.id', '=', 'user_answer.user_id')
            // Nhóm kết quả theo các cột cụ thể
            ->groupBy('user.id', 'user.name')
            ->orderBy('total_score', 'desc') // Sắp xếp theo điểm từ cao đến thấp
            ->limit(5) // Giới hạn kết quả là 5 người chơi
            ->get()
            ->map(function ($user) {
                // Định dạng số thập phân với 2 chữ số sau dấu phẩy
                $user->total_score = number_format($user->total_score, 2);
                return $user;
            });
        $individualScore = DB::table('user')
            ->select('user.id', 'user.name', DB::raw('SUM(user_answer.score) as total_score'))
            ->where('user.id', $userId)
            ->where('user_answer.game_id', $gameId)
            ->join('user_answer', 'user.id', '=', 'user_answer.user_id')
            ->groupBy('user.id', 'user.name')
            ->first();
//            dd($individualScore);
        $score = $individualScore ? number_format($individualScore->total_score, 2) : '0.00';
        return view('games.score', [
            'game' => $game,
            'score' => $score,
            'correctAnswers' => UserAnswer::where('game_id', $gameId)->where('user_id', $userId)->where('score', '!=', 0)->count(),
            'totalQuestions' => $totalQuestions,
            'topUsers' => $topUsers,
        ]);
    }
}
