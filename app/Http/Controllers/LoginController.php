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
    /**
     * Redirect the user to the Twitter authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
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
        Auth::login($authUser, true);
        
        //$twitter_avatar = $user->avatar_original;
        // セッションに保存
        //$request->session()->put([ 'twitter_avatar' => $twitter_avatar ]);
        return redirect()->route('home')->with('status', __('ログインしました。'));;
    }
    private function findOrCreateUser($twitterUser)
    {
        $authUser = User::where('twitter_id', $twitterUser->nickname)->first();
        
        // すでにログインしたことある人
        if ($authUser){
            return $authUser;
        }

        // アバターURLをhttpsに変更
        $twitter_avatar = str_replace('http','https',$twitterUser->avatar);

        // はじめてログインをする人
        return User::create([
            'name' => $twitterUser->name, // デグーのさすけ
            'twitter_id' => $twitterUser->nickname, // TwitterID
            'profile_image_url' => $twitter_avatar //飼い主プロフィール画像
        ]);
        // 初回ログイン者のプロフィールペ入力ページに遷移する処理をここに記載
    }
}
