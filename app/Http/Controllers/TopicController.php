<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Game;
use App\Models\Question;
use App\Models\Topic;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TopicController extends Controller
{
    //
//    public function saveTopic(Request $request)
//    {
//        $topic = new Topic();
//        $topic->name = $request->get('topic');
//        $topic->save();
//        $topicId = $topic->id;
//        Session::put('topic_id', $topicId);
//        return redirect()->route('saveGame');
//    }
//    public function saveGame(Request $request)
//    {
//        $game = new Game();
//        $game->name = $request->get('game');
//        $game->topic_id = Session::get('topic_id');
//        $game->save();
//        $gameId = $game->id;
//        Session::put('game_id', $gameId);
//        return redirect()->route('saveQuestion');
//    }
//    public function saveQuestion(Request $request)
//    {
//        $question = new Question();
//        $question->game_id = Session::get('game_id');
//        $question->content = $request->get('question');
//        $question->score= 10;
//        $question->save();
//        $questionId = $question->id;
//        Session::put('question_id', $questionId);
//        return redirect()->route('saveAnswer');
//    }
//    public function saveAnswer(Request $request)
//    {
//        $answer = new Answer();
//        $answer->question_id = Session::get('question_id');
//        $answer->answer = $request->get('answers');
//        $answer->correct_answer  = $request->get('correct_answer');
//        $answer->save();
//        return view('Lưu thành công');
//    }
    public function saveAll(Request $request)
    {
        // Lưu Topic
        $topic = new Topic();
        $topic->name = $request->get('topic');
        $topic->save();
        $topicId = $topic->id;

        // Lưu Game
        $game = new Game();
        $game->name = $request->get('game');
        $game->topic_id = $topicId;
        $game->save();
        $gameId = $game->id;

        $question = new Question();
        $question->game_id = $gameId;
        $question->content = $request->get('questions');
        $question->correct_answer = $request->get('correct_answer');;
        $question->score = 10;
        $question->created_by=1;
        $question->save();
        $questionId = $question->id;

        // Lưu đáp án
        $answer = new Answer();
        $answer->question_id = $questionId;
        $answer->answer_content = $request->get('answer_content');
        $answer->correct_answer = $request->get('answer_content');
        $answer->save();

        echo 'Lưu thành công';
        return;
    }

    public function viewTopic()
    {
        $topic = Topic::paginate(1);
        $usersID = Session::get('user_id');
        $users = Users::findOrFail($usersID);
        return view('users.topic-list', compact('topic', 'users'));
    }

    // lưu id của type
    public function saveIdType(Request $request)
    {
        $type = $request->get('type');
        $typeId = $request->get('type_id');
        if ($type == "topic") {
            Session::put('topic_id', $typeId);
        } else if ($type == "game") {
            Session::put('game_id', $typeId);
        }
//        Session::put('topic_id', $typeId);
        // tạm thờ sẽ là trả về view game
        return redirect()->route('game');
    }

    public function viewGame()
    {
        $usersID = Session::get('user_id');
        $users = Users::findOrFail($usersID);
        $topicID = Session::get('topic_id');
//        $topics = Topic::findOrFail($topicID) ;
        $games = Game::findOrFail($topicID);
        return view('users.game', compact('games', 'users'));
    }
}
//What is the value of 2 + 2?
