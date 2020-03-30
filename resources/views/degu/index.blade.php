@extends('layouts.app')
@section('title', 'デグー一覧')
@section('content')
<div class="container-fluid mt-0 py-5 header-area">
    <div class="row ">
        <div class="col-md-12">
            <h1 class="text-center text-white">登録デグー</h1>
            <div class="text-center mt-4">
                <a href="./degu/register" type="button" class="btn">デグーを登録する</a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    @if (session('success'))
    <div class="row">
        <div class="col-12">

            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    </div>
    @endif
    <div class="row mt-1 degus-card">
        @foreach($degus as $degu)
        <div class="col-sm-12 col-md-6 col-lg-4 p-2">
            <a href="{{ url('degu').'/'.$degu->id }}">
                <div class="row m-2 shadow rounded-lg bg-white">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 m-3 mx-auto">
                                @php
                                $deguImageUrl =  $degu->photo_url;
                                $deguImageUrl = 'https://degiita.s3-ap-northeast-1.amazonaws.com/'.str_replace('public','storage',$deguImageUrl);
                                @endphp
                                <img src="{{ $deguImageUrl }}" class="img-fluid rounded mx-auto d-block"
                                    alt="デグーのさすけ">
                            </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="text-center">{{ $degu->name }}</h2>
                                    </div>
                                    <div class="col-md-12">
                                        <p>{{ $degu->profile_message }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    {{-- Widjet --}}
    <div class="row">
        {{-- Left Widjet --}}
        <div class="col-sm-12 col-md-4 col-lg-4 my-3">
            <img class="img-fluid d-block mx-auto" src="https://via.placeholder.com/336x280.png?text=Ad" alt="">
        </div>
        {{-- Center Widjet --}}
        <div class="col-sm-12 col-md-4 col-lg-4 my-3">
            <img class="img-fluid d-block mx-auto" src="https://via.placeholder.com/336x280.png?text=Ad" alt="">
        </div>
        {{-- Right Widjet --}}
        <div class="col-sm-12 col-md-4 col-lg-4 my-3">
            <img class="img-fluid d-block mx-auto" src="https://via.placeholder.com/336x280.png?text=Ad" alt="">
        </div>
    </div>
</div>
@endsection