<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Degu;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DeguController extends Controller
{
    /**
     * ログイン済みのユーザーでないと認証画面が出る->web.phpで設定済み
     *
     * @return void
     */
    public function register(){
        return view('degu/register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $degu = new Degu; // Deguモデル
        $form = $request->all();

        // バリデーション
        $rules = [
            'id' => 'required',
            'degu_name' => 'required',
            'degu_sex' => 'required',
            'degu_profile' => 'required',
        ];
        $message = [
            'id.sex' => '性別が入力されていません。',
            'd.profile' => 'プロフィールが入力されていません。',
        ];
        $validator = Validator::make($form, $rules, $message);

        if ($validator->fails()) {
            dd($validator);
            return redirect('degu')
                ->withErrors($validator)
                ->withInput();
        } else { // バリデーションが通った時
            unset($form['_token']);
            $degu->degu_name = $request->degu_name;
            $degu->degu_sex = $request->degu_sex;
            $degu->degu_profile = $request->degu_profile;
            $degu->save();
            return redirect('degu');
        }
    }

    public function index()
    {
        $degus = DB::table('degus')->get();
        return view('degu/index', ['degus' => $degus]);
    }

    public function page($id) {
        $degu = Degu::find($id);
        //dd($degu);
        return view('degu/page',compact('degu'));
    }
}
