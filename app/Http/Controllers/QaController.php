<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QaController extends Controller
{
    //
    public function index(){
        return view('qa/index');
    }
}
