<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Game;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function index()
    {


        $users = User::paginate(5);

        $games = Game::paginate(5);

        $topUsers = DB::table('user_answer')
            ->select('user_id', DB::raw('SUM(score) as total_score'))
            ->groupBy('user_id')
            ->orderBy('total_score', 'desc')
            ->limit(100)
            ->get();

        $overview = [
            'users_count' => User::count(),
            'games_count' => Game::count(),
            'questions_count' => Question::count()
        ];

        return view('admin.main', compact('users', 'games', 'topUsers', 'overview'));
    }

    public function searchUsers(Request $request)
    {
        $query = $request->input('query');

        $users = Admin::where('name', 'like', "%{$query}%")
            ->orWhere('email', 'like', "%{$query}%")
            ->paginate(2);

        return view('admin.main', compact('users'));
    }

    public function addUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Admin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);


        $users = Admin::paginate(2);
        return response()->json([
            'success' => 'Người dùng đã được thêm thành công!',
            'users' => $users,
        ]);
    }



    public function deleteUser($id)
    {
        User::destroy($id);
        return redirect()->route('admin.users')->with('success', 'Người dùng đã được xóa thành công.');
    }

    public function toggleUserStatus($id)
    {
        $user = User::findOrFail($id);
        $user->status = !$user->status;
        $user->save();

        return redirect()->route('admin.users')->with('success', 'Trạng thái người dùng đã được cập nhật.');
    }


    public function deleteGame($id)
    {
        $game = Game::findOrFail($id);
        foreach ($game->questions as $question) {
            $question->answers()->delete();
        }
        $game->questions()->delete();
        $game->delete();

        return redirect()->route('admin')->with('success', 'Game đã được xóa thành công.');
    }

}


