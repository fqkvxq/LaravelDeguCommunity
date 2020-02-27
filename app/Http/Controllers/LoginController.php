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
        //dd($user);
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);
        
        $twitter_avatar = $user->avatar_original;
        // セッションに保存
        $request->session()->put([ 'twitter_avatar' => $twitter_avatar ]);
        return redirect()->route('home');
    }
    private function findOrCreateUser($twitterUser)
    {
        $authUser = User::where('id', $twitterUser->id)->first();
        //dd($authUser);
        if ($authUser){
            return $authUser;
        }
        return User::create([
            'name' => $twitterUser->name,
            'handle' => $twitterUser->nickname,
            'twitter_id' => $twitterUser->id,
            'avatar' => $twitterUser->avatar_original,
            'email' => Hash::make('email',['rounds' => 12]),
            'password' => Hash::make('password',['rounds' => 12])
        ]);
    }
}
