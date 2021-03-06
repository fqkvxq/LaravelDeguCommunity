@extends('layouts.app')
@php
$title = $degu->name;
@endphp
@section('title', $title)
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 bg-white shadow-sm">
            <div class="row">
                <div class="col-md-12 mx-auto py-5">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    @php
                                    $deguImageUrl = $degu->photo_url;
                                    $deguImageUrl =
                                    'https://degiita.s3-ap-northeast-1.amazonaws.com/'.str_replace('public','storage',$deguImageUrl);
                                    $ogp = $deguImageUrl;
                                    @endphp
                                    @section('ogp', $ogp)
                                    <img src="{{ url($deguImageUrl) }}" class="img-fluid rounded mx-auto d-block"
                                        alt="{{$degu->name}}">
                                </td>
                            </tr>
                            <tr>
                                <th>お名前</th>
                                <td>
                                    {{$degu->name}}
                                </td>
                            </tr>
                            <tr>
                                <th>飼い主</th>
                                <td>
                                    {{$degu->user->name}}
                                </td>
                            </tr>
                            <tr>
                                <th>性別</th>
                                <td>{{$degu->sex}}</td>
                            </tr>
                            <tr>
                                <th>ひとこと</th>
                                <td>{{$degu->profile_message}}</td>
                            </tr>
                        </tbody>
                    </table>
                    @php
                    $twitter_id = $degu->user->twitter_id
                    @endphp
                    @if($twitter_id)
                    <a href="{{__('https://twitter.com/')}}{{$twitter_id}}"
                        class="btn btn-block btn-outline-primary">飼い主さんのTwitterをのぞく</a>
                    @endif
                </div>
            </div>
        </div>
        {{-- 右サイドバー --}}
        <div class="col-md-4">
            <div class="row my-3">
                <div class="col-md-12">
                    <div class="row p-3">
                        <div class="col-md-12">
                            <a href="https://px.a8.net/svt/ejp?a8mat=2TTKIY+ZQ12Q+50+3IAOK1" rel="nofollow"><img border="0" width="300" height="250" alt="" src="https://www20.a8.net/svt/bgt?aid=171020842060&wid=001&eno=01&mid=s00000000018021213000&mc=1"></a><img border="0" width="1" height="1" src="https://www12.a8.net/0.gif?a8mat=2TTKIY+ZQ12Q+50+3IAOK1" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-12">
                    <div class="row p-3">
                        <div class="col-md-12">
                            <a href="https://px.a8.net/svt/ejp?a8mat=3B9SL8+A07BB6+4FTM+601S1" rel="nofollow"><img border="0" width="300" height="250" alt="" src="https://www21.a8.net/svt/bgt?aid=200331260605&wid=003&eno=01&mid=s00000020713001008000&mc=1"></a><img border="0" width="1" height="1" src="https://www11.a8.net/0.gif?a8mat=3B9SL8+A07BB6+4FTM+601S1" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-12">
                    <div class="row p-3">
                        <div class="col-md-12">
                             <a href="https://px.a8.net/svt/ejp?a8mat=3B7B8T+IGNH6+2QQG+6GC75" rel="nofollow"><img border="0" width="300" height="250" alt="" src="https://www22.a8.net/svt/bgt?aid=200215469031&wid=010&eno=01&mid=s00000012796001084000&mc=1"></a><img border="0" width="1" height="1" src="https://www16.a8.net/0.gif?a8mat=3B7B8T+IGNH6+2QQG+6GC75" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection