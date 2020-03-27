@extends('layouts.app')
@section('title', 'デグー一覧')
@section('content')
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
        <div class="col-lg-4 col-md-6 p-2">
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
</div>
@endsection