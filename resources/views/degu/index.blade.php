@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-1 degus-card">
        @foreach($degus as $degu)
        <div class="col-lg-4 col-md-6 p-2">
            <a href="{{ url('degu').'/'.$degu->id }}">
                <div class="row m-2 shadow-sm rounded-lg bg-white">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 m-3 mx-auto">
                                <img src="https://via.placeholder.com/1200x630.png"
                                    class="img-fluid rounded mx-auto d-block" alt="デグーのさすけ">
                            </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="text-center">{{ $degu->degu_name }}</h2>
                                    </div>
                                    <div class="col-md-12">
                                        <p>{{ $degu->degu_profile }}</p>
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