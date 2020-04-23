<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\User;
use Carbon\Carbon;
use Auth;
use Socialite;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class QaController extends Controller
{
    // ================================================
    // 質問一覧画面
    // ================================================
    public function index()
    {
        $questions = DB::table('questions')->orderBy('created_at', 'desc')->paginate(10); //取得順番を逆に
        return view('qa/index', ['questions' => $questions]);
    }

    // ================================================
    // 個別の質問画面
    // ================================================
    public function page($id)
    {
        $questions = DB::table('questions')->orderBy('created_at', 'desc')->get(); //取得順番を逆に
        $question = Question::with('user')->find($id);
        $answers = Answer::with('user')->where('question_id',$id)->get();
        $user = User::find($id);
        return view('qa/page', compact('questions', 'question', 'answers', 'user'));
    }

    // ================================================
    // 質問を追加したときの処理
    // ================================================
    public function addQuestion(Request $request)
    {
        $question = new Question;
        $answer = new Answer;
        $user = Auth::user();
        $form = $request->all();

        // Validation
        $rules = [
            'question_text' => 'required',
            'question_title' => 'required',
            'category' => 'required',
        ];
        $message = [
            'question_text.required' => '質問文を入力してください。',
            'category.required' =>'カテゴリーを選んでください。',
        ];
        $validator = Validator::make($form, $rules, $message);

        if ($validator->fails()) {
            // dd($validator);
            return redirect('qa/index')
                ->withErrors($validator)
                ->withInput();
        } else { // バリデーションが通った時
            unset($form['_token']);
            $question->title = $request->question_title;
            $question->text = $request->question_text;
            $question->user_id = $user->id;
            $question->answer_flg = $request->answer_flg;
            $question->category = $request->category;
            $question->save();
            return redirect('qa')->with('success', '新しく質問を登録しました！');
        }
    }

    // ================================================
    // 回答を追加したときの処理
    // ================================================
    public function addAnswer(Request $request)
    {
        $answer = new Answer;
        $user = Auth::user();
        $form = $request->all();

        // Validation
        $rules = [
            'answer_text' => 'required'
        ];
        $message = [
            'answer_text.required' => '回答を入力してください。'
        ];
        $validator = Validator::make($form, $rules, $message);

        if ($validator->fails()) {
            // dd($validator);
            return redirect('qa/page')
                ->withErrors($validator)
                ->withInput();
        } else { // バリデーションが通った時
            unset($form['_token']);
            $answer->text = $request->answer_text; //デグーの名前
            $answer->user_id = $user->id;
            $answer->question_id = $request->question_id;
            DB::table('questions')->where(
                'id',
                $answer->question_id
            )->update(['answer_flg' => '1']);
            $answer->save();
            // 二重送信対策
            $request->session()->regenerateToken();
            //dd($degu->photo_url);
            return redirect('qa')->with('success', '新しく回答を登録しました！');
        }
    }
}
