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
        Session::put('gameID', $games->id);  // Lưu gameID vào session, không cần gán lại
        return view('games.start', compact('games'));  // Trả về view với biến $game
    }

    public function checkAccount()
    {
        $gameId = Session::get('gameID');
        $userId = 5;

        $userHasPlayed = UserAnswer::where('user_id', $userId)
            ->where('game_id', $gameId)
            ->exists();
        if ($userHasPlayed) {
            return redirect()->back()->with('error', 'You have already played this game');
        }
        return redirect()->route('viewPlayUsers');
    }
}
