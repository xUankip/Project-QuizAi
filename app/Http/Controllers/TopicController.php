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
    public function searchTopic(Request $request)
    {
        try {
            $topicId = $request->input('topicId');
            $topic = Topic::find($topicId);
            $usersID = Session::get('user_id');
            $users = Users::findOrFail($usersID);
            return view('games.searchTopic', compact('topic', 'users'));
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Topic not found.');
        }
    }
    public function viewTopic()
    {
        $topic = Topic::paginate(6);
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
                return redirect()->route('start', ['id' => $games->id]);
            } else {
                return redirect()->back()->with('error','No games found for this topic');
            }
        }
    }
    public function updateQuestion(Request $request)
    {
        $type = $request->input('type');
        $questionId = $request->input('questionId');

        if($type =="update"){
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


}
