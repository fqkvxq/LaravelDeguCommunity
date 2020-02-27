@extends('layouts.app')

@section('content') {{-- layouts/app.blade.phpで定義 --}}
<div class="container">
  <div class="row">
    <div class="col-md-12 bg-white mx-auto rounded-lg shadow-sm p-5">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <h1 class="text-center">{{ __('デグー情報の登録：') }}</h1>
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">{{ __('デグーのお名前：') }}</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="デグーのお名前を入力してください。">
              <small> {{ __('※デグーの登録は1匹ずつとなります。') }}</small>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">{{ __('デグーの性別：') }}</label><br>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline1">{{ __('男の子') }}</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline2">{{ __('女の子') }}</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline3" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline3">{{ __('不明') }}</label>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">{{ __('デグーの写真：') }}</label><br>
              <div class="input-group mb-3">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="inputGroupFile01"
                    aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">ファイルを選択してください。</label>
                </div>
              </div>
              <small> {{ __('※写真の形式は、jpeg、png、bmpがサポートされています。') }}</small>
            </div>
            <div class="form-group">
              <label for="">{{ __('プロフィール文：') }}</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              <p class="text-right small">あと300文字</p>
            </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">{{ __('上記内容に間違いはありません。') }}</label>
            </div>
            <button type="submit" class="d-block mx-auto btn btn-primary">{{ __('登録') }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection