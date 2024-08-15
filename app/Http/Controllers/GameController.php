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
}
