<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Degu;
use Illuminate\Support\Facades\Validator;

class DeguController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Degu::all();
        return view('degu');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        if($validator->fails()){
            dd($validator);
            return redirect('degu')
                ->withErrors($validator)
                ->withInput();
        }else{
            unset($form['_token']);
            $degu->degu_name = $request->degu_name;
            $degu->degu_sex = $request->degu_sex;
            $degu->degu_profile = $request->degu_profile;
            $degu->save();
            return redirect('degu');
            dd($degu);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
