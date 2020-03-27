<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    //環境を判別するbool値を設定するプロパティを定義
    protected $is_production;

    public function __construct()
    {
        //__construct内で環境を判別してプロパティに値をセット
        $this->is_production = env('APP_ENV') === 'production' ? true : false;
    }
    /**
     * Redirect the user to the Twitter authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect($this->is_production);
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function handleProviderCallback(Request $request)
    {
        //ユーザー情報を取得
        $user = Socialite::driver('twitter')->user();
        $authUser = $this->findOrCreateUser($user);
        //dd($authUser);
        Auth::login($authUser, true);

        //$twitter_avatar = $user->avatar_original;
        // セッションに保存
        //$request->session()->put([ 'twitter_avatar' => $twitter_avatar ]);
        return redirect($this->is_production)->route('home')->with('status', __('ログインしました。'));;
    }
    private function findOrCreateUser($twitterUser)
    {
        $authUser = User::where('id', $twitterUser->id)->first();
        //dd($twitterUser);

        // すでにログインしたことある人
        if ($authUser) {
            return $authUser;
        }

        // はじめてログインをする人
        return User::create([
            'name' => $twitterUser->name, // デグーのさすけ
            'twitter_id' => $twitterUser->nickname, // TwitterID
            'profile_image_url' => $twitterUser->avatar //飼い主プロフィール画像
        ]);
        // 初回ログイン者のプロフィールペ入力ページに遷移する処理をここに記載
    }
}
