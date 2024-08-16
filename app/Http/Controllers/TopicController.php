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
        $topic = Topic::paginate(4);
        $usersID = Session::get('user_id');
        $users = Users::findOrFail($usersID);
        return view('games.mygame', compact('topic', 'users'));
    }

    // lưu id của type
    public function saveIdType(Request $request)
    {
        $type = $request->get('type');
        $typeId = $request->get('type_id');
        if ($type == "topic") {
            Session::put('topic_id', $typeId);

            // Tìm tất cả các trò chơi với topic_id tương ứng
            $games = Game::where('topic_id', $typeId)->first(); // Lấy trò chơi đầu tiên hoặc null

            if ($games) {
                // Chuyển hướng tới trang bắt đầu với ID của trò chơi đầu tiên
                return redirect()->route('start', ['id' => $games->id]);
            } else {
                // Không có trò chơi nào được tìm thấy, xử lý theo cách khác (chẳng hạn thông báo lỗi)
                return redirect()->back()->with('error', 'No games found for this topic.');
            }
        }
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
