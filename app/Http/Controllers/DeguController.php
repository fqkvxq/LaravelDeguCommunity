<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Degu;
use App\User;
use Auth;
use Socialite;
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
        $user = Auth::user();
        $form = $request->all();

        // バリデーション
        $rules = [
            'id' => 'required', //デグー
            'degu_name' => 'required',
            'degu_sex' => 'required',
            'degu_profile' => 'required',
            'photo_url' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
        $message = [
            'id.sex' => '性別が入力されていません。', //?後ほど修正
            'd.profile' => 'プロフィールが入力されていません。', //?後ほど修正
        ];
        $validator = Validator::make($form, $rules, $message);

        if ($validator->fails()) {
            // dd($validator);
            return redirect('degu')
                ->withErrors($validator)
                ->withInput();
        } else { // バリデーションが通った時
            unset($form['_token']);
            $degu->name = $request->degu_name; //デグーの名前
            $degu->sex = $request->degu_sex; //デグーの性別
            $degu->profile_message = $request->degu_profile; //デグーのプロフィール文章
            $degu->owner_id = $user->id; //飼い主固有のID
            $degu->owner_name = $user->name; //飼い主の名前
            $imagefile = $request->file('photo_url');
            $degu->photo_url = $imagefile->store('public/degu_images');
            $degu->save();
            //dd($degu->photo_url);
            return redirect('degu')->with('success', '新しくデグー情報を登録しました！');
        }
    }

    public function index()
    {
        $degus = DB::table('degus')->get();
        return view('degu/index', ['degus' => $degus]);
    }

    public function page($id) {
        $degu = Degu::find($id);
        $user = User::find($id);
        //dd($degu);
        return view('degu/page',compact('degu','user'));
    }
}
