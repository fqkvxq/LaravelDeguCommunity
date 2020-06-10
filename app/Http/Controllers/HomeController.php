<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        return redirect('qa');
    }
}
