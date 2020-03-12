<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Qa;
use App\User;
use Auth;
use Socialite;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class QaController extends Controller
{
    //
    public function index(){
        $qas = DB::table('qas')->orderBy('created_at', 'desc')->get(); //取得順番を逆に
        return view('qa/index' , ['qas' => $qas]);
    }

    public function addQuestion(Request $request){
        $qa = new Qa;
        $user = Auth::user();
        $form = $request->all();

        // Validation
        $rules = [
            'question_text' => 'required'
        ];
        $message = [
            'question_text.required' => '質問文を入力してください。'
        ];
        $validator = Validator::make($form, $rules, $message);

        if ($validator->fails()) {
            // dd($validator);
            return redirect('qa/index')
                ->withErrors($validator)
                ->withInput();
        } else { // バリデーションが通った時
            unset($form['_token']);
            $qa->question_text = $request->question_text; //デグーの名前
            $qa->user_id = $user->id;
            $qa->answer_flg = $request->answer_flg;
            $qa->save();
            //dd($degu->photo_url);
            return redirect('qa')->with('success', '新しく質問を登録しました！');
        }
    }
}
