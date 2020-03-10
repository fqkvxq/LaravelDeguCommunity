@extends('layouts.app')
@push('js')
<script src="{{ asset('/js/croppie.js') }}"></script>
@endpush
@push('css')
<script src="{{ asset('/css/croppie.css') }}"></script>
@endpush
@section('title', 'デグーの登録')
@section('content') {{-- layouts/app.blade.phpで定義 --}}
<div class="container register-degu">
  <div class="row">
    <div class="col-md-8 bg-white mx-auto rounded-lg shadow-sm p-5">
      <img class="deguillust rounded-circle img-fluid" src="{{ asset('uploads/oyaji_square.jpg') }}" alt="" srcset="">
      <div class="row">
        <div class="col-lg-12 mx-auto">
          <h1 class="text-center">{{ __('デグー情報の登録') }}</h1>
          <form action="/degu/register/add" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="1">
            <div class="form-group">
              <h2 for="exampleInputEmail1">{{ __('デグーのお名前') }}</h2>
              <input type="text" class="form-control" name="degu_name" id="exampleInputEmail1"
                aria-describedby="emailHelp" placeholder="デグーのお名前を入力してください。" required>
              <small> {{ __('※デグーの登録は1匹ずつとなります。') }}</small>
            </div>
            <div class="form-group">
              <h2 for="exampleInputEmail1">{{ __('デグーの性別') }}</h2>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" value="男の子" id="customRadioInline1" name="degu_sex" class="custom-control-input"
                  required>
                <label class="custom-control-label" for="customRadioInline1">{{ __('男の子') }}</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" value="女の子" id="customRadioInline2" name="degu_sex" class="custom-control-input"
                  required>
                <label class="custom-control-label" for="customRadioInline2">{{ __('女の子') }}</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" value="不明" id="customRadioInline3" name="degu_sex" class="custom-control-input"
                  required>
                <label class="custom-control-label" for="customRadioInline3">{{ __('不明') }}</label>
              </div>
            </div>
            <div class="form-group">
              <h2 for="exampleInputEmail1">{{ __('デグーの写真') }}</h2>
              <div class="input-group mb-3">
                <div class="custom-file">
                  <input type="file" name="photo_url" class="custom-file-input" id="inputDeguPhoto"
                    aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">ファイルを選択してください。</label>
                </div>
              </div>
              <small> {{ __('※写真の形式は、jpeg、png、bmpがサポートされています。') }}</small>
              <div class="js-croppie"></div>
            </div>
            <div class="form-group">
              <h2 for="">{{ __('プロフィール文') }}</h2>
              <textarea class="form-control" name="degu_profile" id="exampleFormControlTextarea1" rows="3"
                required></textarea>
              <p class="text-right small">あと300文字</p>
            </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">{{ __('上記内容に間違いはありません。') }}</label>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <button type="submit" class="store d-block mx-auto btn btn-lg">{{ __('登録') }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection