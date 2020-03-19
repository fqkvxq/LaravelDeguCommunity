@extends('layouts.app')
@php
    $title = $degu->name
@endphp
@section('title', $title)
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 bg-white shadow-sm">
            <div class="row">
                <div class="col-md-6 mx-auto py-5">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                        @php
                                        $deguImageUrl =  $degu->photo_url;
                                        $deguImageUrl = str_replace('public','storage',$deguImageUrl);
                                        @endphp
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
                     $twitter_id =  $degu->user->twitter_id
                    @endphp
                    @if($twitter_id)
                        <a href="{{__('https://twitter.com/')}}{{$twitter_id}}" class="btn btn-block btn-outline-primary">飼い主さんのTwitterをのぞく</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection