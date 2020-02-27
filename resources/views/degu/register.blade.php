@extends('layouts.app')

@section('content') {{-- layouts/app.blade.phpで定義 --}}
<div class="container">
    <div class="row">
        <div class="col-md-8 bg-white mx-auto rounded-lg shadow-sm">
            <h1 class="text-center">デグー情報の登録</h1>
            <h2>デグーの名前</h2>
            <input type="text" name="degunname" id="" placeholder="デグーの名前を入力してください">
            <h3>デグーの生年月日</h3>
            <input type="date" name="" id="">
            <h3>デグーの性別</h3>
            <div class="form-check">
                    <input class="form-check-input" type="radio" name="radio1" id="radio1a" checked>
                    <label class="form-check-label" for="radio1a">男の子</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="radio1" id="radio1b">
                    <label class="form-check-label" for="radio1b">女の子</label>
                  </div>
        </div>
    </div>
</div>
@endsection