<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Game;
use App\Models\Question;
use App\Models\Topic;
use App\Models\UserAnswer;
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

        $userHasPlayed = UserAnswer::where('user_id', $userId)
            ->where('game_id', $gameId)
            ->exists();
        if ($userHasPlayed) {
            return redirect()->back()->with('error', 'You have already played this game');
        }
        return redirect()->route('viewPlayUsers');
    }
    public function editOrDelete(Request $request)
    {
        $type = $request->input('type');
        if($type =="update"){
            $question = new Question();
            $question->id = $request->input('question_id');
            $question = Question::findOrFail($question->id);
            $question->content = $request->input('questions');
            $question->correct_answer = $request->input('correct_answer');
            $question->update();
            $answerId = $request->input('answer_id');
            $answerContents = $request->input('answer_content');
            foreach ($answerId as $index => $answerId) {
                $answer = Answer::findOrFail($answerId);
                $answer->answer_content = $answerContents[$index];
                $answer->update();
            }
            return redirect()->back();
        }
        else if($type =="delete"){
            $question = Question::findOrFail($request->input('question_id'));
            $question->delete();

            $answerId = $request->input('answer_id');
            foreach ($answerId as $answerId) {
                $answer = Answer::findOrFail($answerId);
                if($answer && $answer->question_id == $question->id){
                    $answer->delete();
                }
            }
            return redirect()->back();
        }
        else if($type =="continue"){
            $gameId = $request->input('game_id');
            return redirect()->route('start',['id' => $gameId]);
        }
        else if($type =="create"){
            return redirect()->route('showForm');
        }
    }

    public function updateQuestion(Request $request)
    {
        $questionId = $request->input('questionId');
        $question = Question::findOrFail($questionId);
        if($question == null){
            // @Todo create not found page.
            return view('404');
        }
        $question->content = $request->input('content');
        // validate before save
        $updatedAnswers = $request->input('answers');
        foreach($question->answers as $answer){
            if(array_key_exists($answer->id, $updatedAnswers)){
                if($answer->answer_content == $question->correct_answer){
                    $question->correct_answer = $updatedAnswers[$answer->id];
                }
                $answer->answer_content = $updatedAnswers[$answer->id];
                $answer->update(); // need update performance.
            }
        }
        $question->update();
        return redirect('/quiz/' . $question->game_id);
    }

    public function updateAnswer(Request $request)
    {

    }
}
