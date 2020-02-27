<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeguIndexController extends Controller
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

    public function index()
    {
        return view('degu/index');
    }
}
