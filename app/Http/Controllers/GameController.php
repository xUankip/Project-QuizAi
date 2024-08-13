<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Game;
use App\Models\Question;
use App\Models\Topic;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\DB;
use SomeNamespace\Exceptions\ConnectionException;
use Illuminate\Http\Request;
use OpenAI;

class GameController extends Controller
{
    public function start(){
        return view('games.start');
    }
}
