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
    public function saveAll()
    {
    }
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
//        dd($type);
    }
    public function updateQuestion(Request $request)
    {
        $type = $request->input('type');
        $questionId = $request->input('questionId');

//        dd($questionId );
        if($type =="update"){
//            $questionId = $request->input('questionId');
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
//                    if($answer->answer_content == $question->correct_answer){
//                        $question->correct_answer = $updatedAnswers[$answer->id];
//                    }
                    $answer->answer_content = $updatedAnswers[$answer->id];
                    $answer->update(); // need update performance.
                }
            }
            $question->update();
        } else if($type =="delete"){
            $question = Question::findOrFail($questionId);
//            dd($questionId);
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
                    $answer->delete(); // need update performance.
                }
            }
            $question->delete();
        }
        return redirect('/user/quiz/topic/game/' . $question->game_id);
    }
    public function viewSearch()
    {
        return view('searchIdGame');
    }
    public function search(Request $request){

    }

}
