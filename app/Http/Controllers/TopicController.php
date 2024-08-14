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
