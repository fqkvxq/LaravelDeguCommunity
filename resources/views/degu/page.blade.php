@extends('layouts.app')
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
                                            alt="デグーのさすけ">
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
                    <button class="btn btn-block btn-outline-primary">Twitter</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection