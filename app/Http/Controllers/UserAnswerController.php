<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserAnswerController extends Controller
{
    //
    public function topUser()
    {
        $game_id = Session::get('gameID');
        // Truy vấn đến bảng users
        $topUsers = DB::table('user')
            // Chọn cột của user và cột total_score trong bảng user_answers
            ->select('user.id', 'user.name', DB::raw('SUM(user_answer.score) as total_score'))
            ->where('user_answer.game_id',$game_id)

            // Kết hợp bảng users với bảng user_answer để lấy điểm số của từng người chơi
            ->join('user_answer', 'user.id', '=', 'user_answer.user_id')
            // Nhóm kết quả theo các cột cụ thể
            ->groupBy('user.id', 'user.name')
            ->orderBy('total_score', 'desc') // Sắp xếp theo điểm từ cao đến thấp
            ->limit(3) // Giới hạn kết quả là 3 người chơi
            ->get();

        return view('top_players_test', ['topUsers' => $topUsers]);
    }
    public function userScore()
    {
        // lấy id
        $id = Session::get('user_id');
        $game_id = Session::get('gameID');
        $userScore = DB::table('user')
            // Chọn cột của user và cột total_score trong bảng user_answers
            ->select('user.id', 'user.name', DB::raw('SUM(user_answer.score) as total_score'))
            // Kết hợp bảng users với bảng user_answer để lấy điểm số của từng người chơi
            ->join('user_answer', 'user.id', '=', 'user_answer.user_id')
            // Nhóm kết quả theo các cột cụ thể
            ->groupBy('user.id', 'user.name')
            ->where('user.id',$id)
            ->where('user_answer.game_id',$game_id)
            ->first();
        return view('user_score', ['userScore' => $userScore]);
    }

}
