<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Question;
use App\Category;

class HomeController extends Controller
{
    /**
     * ログイン済みのユーザーでないと認証画面が出る
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $carbon = new Carbon;
        $questions = Question::with('category')->orderBy('created_at', 'desc')->paginate(10); //取得順番を逆に
        $categories = Category::all();
        $sort = $request->sort;
        if($sort=="rand"){
            $questions = Question::with('category')->inRandomOrder()->paginate(10); //取得順番を逆に
        }elseif(!empty($sort)){
            $questions = Question::with('category')->orderBy('created_at', $sort)->paginate(10); //取得順番を逆に
        }
        return view('qa/index', compact('questions', 'categories','carbon'));
    }
}
